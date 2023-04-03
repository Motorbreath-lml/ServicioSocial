#Recorrer todo el archivo inventario.csv buscando patrones para realizar las insercciones
import re
import os

ruta_general=os.path.dirname(__file__)
ruta_carpeta_archivosBase = os.path.join(ruta_general, "archivosBase")
ruta_archivo = os.path.join(ruta_carpeta_archivosBase, "inventario.csv")

ruta_carpeta_scriptsSQL = os.path.join(ruta_general, "scriptsSQL")
ruta_archivo_sql = os.path.join(ruta_carpeta_scriptsSQL, "insercciones_inventario.sql")

#Buscamos patrones para crear una instruccion como la siguiente
#INSERT INTO inventario VALUES ('41171703', 'Escritorio', NULL, (select id_localizacion from localizaciones where area_id=4 and digito_2=1 and digito_3=1),(select id_material from materiales where tipo_de_material_id=7 and digito_5=1 and digito_6=7),0,3);
pattern=re.compile(r'^(\d)(\d)(\d)(\d)(\d)(\d)(\d)(\d),([^,]*),([^,]*),.*$')

fn=open(ruta_archivo,"r", encoding="utf8")
numero_lineas=len(fn.readlines())
fn.close()

f=open(ruta_archivo,"r", encoding="utf8")
w=open(ruta_archivo_sql,"w+", encoding="utf8")
w.write("-- SET FOREIGN_KEY_CHECKS=0;\n")
w.write("INSERT INTO inventario VALUES\n")
contador=0
#El diccionario servira para saver cuantos los codigos que se repiten y cuantas veces
diccionario={}
for line in f:
    res=re.match(pattern,line)
    if(res):
        # print(res)
        # print("Digito 1: "+res.group(1))
        # print("Digito 2: "+res.group(2))
        # print("Digito 3: "+res.group(3))
        # print("Digito 4: "+res.group(4))
        # print("Digito 5: "+res.group(5))
        # print("Digito 6: "+res.group(6))
        # print("Digito 7: "+res.group(7))
        # print("Digito 8: "+res.group(8))

        codigo=""
        for i in range (1,9):
            codigo+=res.group(i)
        #print("El codigo es: "+codigo)
        #print("Nombre: "+res.group(9))
        #print("Observaciones: "+res.group(10))

        #Verificar los codigos que se duplican, si se duplican se agrega '-Cn' donde n es el numero de duplicidad
        #Si un codigo no  esta en el diccionario se agrega
        if codigo not in diccionario:
            diccionario[codigo]=0
        else:
            diccionario[codigo]+=1
            codigo+="-C" +str(diccionario[codigo])

        nombre=res.group(9)
        observaciones=res.group(10)
        text=""
        if contador!=0:
            text+=",\n"
        text+="('"+codigo+"','"+nombre+"','"+observaciones+"',(SELECT id_localizacion from localizaciones where area_id="+res.group(1)+" and digito_2="+res.group(2)+" and digito_3="+res.group(3)+"),(SELECT id_material from materiales where tipo_de_material_id="+res.group(4)+" and digito_5="+res.group(5)+" and digito_6="+res.group(6)+"),"+res.group(7)+","+res.group(8)+","+"NULL)"
        # ('41171703', 'Escritorio', NULL, (select id_localizacion from localizaciones where area_id=4 and digito_2=1 and digito_3=1),(select id_material from materiales where tipo_de_material_id=7 and digito_5=1 and digito_6=7),0,3,NULL),        

        contador+=1
        w.write(text)
    else:
        print(line)
#Cerrar archivos
w.write(";")
f.close()
w.close()

print("Numero de lineas: "+str(numero_lineas)+" contador: "+str(contador))

#Obtencion de los codigos que se repitan por lomenos una vez
diccionario_filtrado={k:v for (k,v) in diccionario.items() if v>0}

#Como son codigo

print("Los codigos duplicados: frecuencia de duplicidad")
print(diccionario_filtrado)
print("Estos codigos se les agrego al final '-Cn' que indica que es el complemento n")