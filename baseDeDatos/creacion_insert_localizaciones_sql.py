#Creacion de la sentencia insert para la Tabla LOCALIZACIONES
import os

ruta_general=os.path.dirname(__file__)
ruta_carpeta_scriptsSQL = os.path.join(ruta_general, "scriptsSQL")
ruta_archivo = os.path.join(ruta_carpeta_scriptsSQL, "insercciones_localizaciones.sql")

w=open(ruta_archivo,"w+", encoding="utf8")
w.write("INSERT INTO localizaciones (area_id, digito_2, digito_3, descripcion)VALUES\n")

#Insercciones para el Area 1
for i in range(1,19): #Hay 18 mesas de trabajo en esta area
    linea="(1,"
    if i<10:
        linea+=str(i)+",0,"
    elif i==10:
        linea+="0,0,"
    else:
        linea+="1,"+str(i-10)+","
    linea+="'Mesa "+str(i)+" de Trabajo para ensamble Manual'),\n"
    w.write(linea)

#insercciones para el Area 2
for i in range(1,17): #hay 16 estaciones de trabajo
    linea="(2,"
    if i<10:
        linea+=str(i)+",0,"
    elif i==10:
        linea+="0,0,"
    else:
        linea+="1,"+str(i-10)+","
    linea+="'Estacion "+str(i)+" de Manufactura con Transporte'),\n"
    w.write(linea)

#insercciones para el Area 3 
for i in range(9): #hay 8 mesas de trabajo
    linea="(3,"+str(i)+",0,'Area 3, Estacion "+str(i)+"'),\n"
    w.write(linea)

#insercciones para el Area 4 servicio social, falta actualizar infromacion
for i in range(4):
    if i==0:
        linea="(4,0,0,'Area 4, Localizacion dentro del area 0 - 0'),\n"
    else:
        linea="(4,1,"+str(i)+",'Area 4, Localizacion dentro del area 1 - "+str(i)+"'),\n"
    w.write(linea)


#Busqueda de los rangos de las localizaciones del area 5
import re

ruta_carpeta_archivosBase = os.path.join(ruta_general, "archivosBase")
ruta_archivo = os.path.join(ruta_carpeta_archivosBase, "inventario.csv")

#El patron es para identificar los registros del area 5, la agrupacion son para las localizaciones y sublocalizaciones
pattern=re.compile(r'^5(\d)(\d).*$')
f=open(ruta_archivo,"r", encoding="utf8")

#El diccionario sirve para saber de la localizacion N cuantas sublocalizaciones M tiene
diccionario={}
for line in f:
    res=re.match(pattern,line)
    if(res):
        #print(res)       
        estante=res.group(1)#Asignamos los grupos a variables para tener mas legibilidad
        gaveta=res.group(2)
        estante=int(estante)#Tranformamos los digitos de String a int
        gaveta=int(gaveta)
        #Si un elemento no  esta en el diccionario se agrega
        if estante not in diccionario:
            diccionario[estante]=gaveta
        #Se busca el valor mas alto para cada estante
        if diccionario[estante]<gaveta:
            diccionario[estante]=gaveta
#print(diccionario)
f.close()

#insercciones para localizaciones del Area 5
for k in range(len(diccionario)):
    for i in range(diccionario[k]+1):
        linea="(5,"+str(k)+","+str(i)+",'Estante "+str(k)+", Gaveta "+str(i)+"'),\n"        
        w.write(linea)

#insercciones para las localizaciones del area 6, las cuales aun no las tengo definidas al momento
w.write("(6,1,1,'Area 6, Localizacion dentro del area 1 - 1'),\n")
w.write("(6,1,2,'Area 6, Localizacion dentro del area 1 - 2'),\n")
w.write("(6,1,3,'Area 6, Localizacion dentro del area 1 - 3'),\n")
w.write("(6,1,4,'Area 6, Localizacion dentro del area 1 - 4');")
w.close()