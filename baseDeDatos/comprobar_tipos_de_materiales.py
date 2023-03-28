import re
import os

pattern=re.compile(r'^(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d),([^,]*),([^,]*),.*$')
base_pattern=re.compile(r'^\((\d),(\d),(\d),\'(.*)\'.*$')

ruta_general=os.path.dirname(__file__)
ruta_SQL = os.path.join(ruta_general, "scriptsSQL")
ruta_archivo = os.path.join(ruta_SQL, "insercciones_areas_y_materiales_completo.sql")

#Se crea un nuevo script de SQL que contenga el tipo de material que hace falta
# mas la base de los materiales que esta en el archivo insercciones.sql
archivo_completo=open(ruta_archivo,"w", encoding="utf8")

#El archivo de insercciones_areas_y_materiales.sql contiene la base de las tablas de la Base de datos
#Obtenida del proyecto de integracion, se busca lo que esta en las tablas de materiales capturado
#para despues comparar con el inventario.csv lo que falta por capturar
ruta_base=os.path.join(ruta_general,"archivosBase")
ruta_archivo = os.path.join(ruta_base, "insercciones_areas_y_materiales.sql")
archivo_base=open(ruta_archivo,"r", encoding="utf8")
materiales_capturadas={}
for line in archivo_base:
    coincidencia=re.match(base_pattern,line)
    if(coincidencia):
        llave=coincidencia.group(1)+coincidencia.group(2)+coincidencia.group(3)
        if llave not in materiales_capturadas:
            materiales_capturadas[llave]=coincidencia.group(4)
    #agregar la base de insercciones.sql al archivo completo
    archivo_completo.write(line)
archivo_base.close()
# print("Lista de los materiales capturados")
# print(materiales_capturadas)

#en esta parte se busca los tipos de materiales no capturados que esten en el csv
#Lo que no esta capturado se guarda en un diciconario, la llave es el tipo de material
#compuesta de tres digitos y el valor es el nombre del elemento en el csv
ruta_archivo = os.path.join(ruta_base, "inventario.csv")
f=open(ruta_archivo,"r", encoding="utf8")
materiales_no_capturados={}
for line in f:
    res=re.match(pattern,line)
    if(res):
        llave=res.group(4)+res.group(5)+res.group(6)
        if llave not in materiales_capturadas:
            #materiales_no_capturados[llave]=llave+" Tipo de material no capturado Nombre del equipo: "+res.group(9)
            materiales_no_capturados[llave]=res.group(9)

# print("Materiales no capturados")
# for k in materiales_no_capturados.keys():
#     print(k+" : "+materiales_no_capturados[k])
f.close()

#Anexar en el archivo de insercciones los tipos de material no capturados
archivo_completo.write("\n-- Materiales que no estaban en el proyecto de integracion\n")
archivo_completo.write("INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES\n")
#(7,1,1,'MESA DE TRABAJO OPERADOR','MESA DE TRABAJO OPERADOR'),
primer_elemento=False
for k in materiales_no_capturados.keys():
    if(primer_elemento):
        archivo_completo.write(",\n")
    else:
        primer_elemento=True
    archivo_completo.write("("+k[0]+","+k[1]+","+k[2]+",'"+materiales_no_capturados[k]+"','"+materiales_no_capturados[k]+"')")
archivo_completo.write(";")
archivo_completo.close()