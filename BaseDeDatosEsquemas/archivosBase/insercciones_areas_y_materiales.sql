-- Escript base, tomado del documento “Implementación de la Metodología de las 5 ́S en un Laboratorio de Docencia”
-- Comparado con el inventario.csv, hay materiales que no han sido camturados, esto se corrige en el script en python comprobar
-- Insertar las areas
INSERT INTO areas VALUES
(1,"Mesas de Trabajo para Ensamble Manual"),
(2,"Estaciones de Manufactura con Transporte"),
(3,"Calidad, Análisis Antropométrico y Ergonómico"),
(4,"Cubículo de Servicio Social"),
(5,"Almacén"),
(6,"Area 6"); -- Esta area no esta en el documento de la metodologia de las 5's

-- Insertar tipo de material
INSERT INTO tipo_de_materiales VALUES
(1,'Instrumentos de Medición'),
(2,'Equipo de Seguridad'),
(3,'Herramienta'),
(4,'Equipo de Cómputo'),
(5,'Material de Prácticas'),
(6,'Manuales y Software'),
(7,'Equipo Móvil');

-- Insertar en tipo de material 1, Instrumentos de medicion
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(1,1,1,'CRONÓMETRO – SPORT LINE','Cronómetro digital marca Sport-Line, guarda hasta 100 datos.'),
(1,1,2,'CRONÓMETRO – EXTECH INSTRUMENTS','Cronómetro digital marca Extech Instruments, guarda hasta 30 datos.'),
(1,1,3,'CRONÓMETRO CONTROL COMPANY','Cronometro digital marca CRONÓMETRO CONTROL COMPANY'), -- Este cronometro no estaba en la tesis
(1,2,1,'FLEXÓMETRO 3 m','Flexómetro de 3 m marca Pretul y Stanley.'),
(1,2,2,'FLEXÓMETRO 5 m','Flexómetro de 5 m marca Pretul y Stanley.'),
(1,3,1,'CINTA MÉTRICA','Cinta métrica marca Seca, para prácticas de antropometría.'),
(1,3,2,'ANTROPÓMETRO','Antropómetro modelo 01290 marca Lafayette Instrument Company.'),
(1,3,3,'BÁSCULA','Báscula digital marca Seca, soporta hasta 250 Kg.'),
(1,4,1,'VERNIER','Vernier digital de acero inoxidable endurecido y templado con pinza del freno digital, pantalla LCD, cambio de unidades, intervalo: 0-6"/150 mm, resolución: 0.0005"/0.01 mm, con barra de profundidades y salida a PC.'),
(1,4,2,'CABLE CONEXIÓN VERNIER','Cable de datos para conectar Vernier electrónico con PC.'),
(1,5,1,'MICRÓMETRO','Micrómetro digital con pantalla LCD de rango de 0-150 mm, con graduación de 0.001 mm y salida de datos a PC.'),
(1,5,2,'CABLE CONEXIÓN MICRÓMETRO','Cable de datos para conectar Micrómetro electrónico con PC.'),
(1,6,1,'MEDIDOR DE ALTURAS','Medidores de altura digital con pantalla LCD, freno mecánico, ajuste a cero, palpador de acero, resolución de 0.01 mm/0.0005", rango de error de +0.03 mm/+0.0015" (300 mm/12"), un rango de medición de 0-12”.'),
(1,6,2,'CABLE CONEXIÓN MEDIDOR DE ALTURAS','Cable de datos para conectar Medidor de Alturas electrónico con PC.'),
(1,7,1,'SONÓMETRO','Sonómetro digital marca Radio Shack con capacidad para 126 dB.'),
(1,7,2,'LUXÓMETRO','Luxómetro digital marca Steren con selector de rango de medición.'),
(1,8,1,'GONIÓMETRO','Goniómetro marca Mitutoyo.'),
(1,9,1,'CÁMARA TERMOGRÁFICA','Cámara Termográfica marca Flir, incluye memoria micro SD, cable para video y accesorios.');

-- Insertar en tipo de material 2, Equipo de seguridad
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(2,1,1,'TAPONES PARA OÍDOS','Tapones protectores para oídos marca Howard Leight.'),
(2,2,1,'MASCARA PROTECTORA','Mascarilla Protectora.'),
(2,3,1,'COFIA','Gorra Protectora Industrial'),
(2,4,1,'GUANTES DE PRECISIÓN','Par de guantes de precisión.'),
(2,4,2,'GUANTES','Par de guantes de carnaza'),
(2,5,1,'GAFAS DE SEGURIDAD','Gafas de seguridad.'),
(2,6,1,'CHALECO DE SEGURIDAD','Chaleco de seguridad.'),
(2,7,1,'PROTECTOR FACIAL','Protector facial para soldar.'),
(2,7,2,'CASCO DE SEGURIDAD','Casco de seguridad.'),
(2,8,1,'ARNES','Juego de arnés.');

-- Insertar en tipo de material 3, Herramienta
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(3,1,1,'DESARMADOR – KIT HERRAMIENTA (PLANO)','Desarmador plano con cabeza de 1/4" marca Crescent.'),
(3,1,2,'DESARMADOR – KIT HERRAMIENTA (CRUZ)','Desarmador de cruz con cabeza del #2 marca Crescent.'),
(3,1,3,'DESARMADOR – KIT HERRAMIENTA TIPO EXTENSIBLE','Desarmador tipo extensión marca Crescent.'),
(3,1,4,'DESARMADOR HUSKY (PLANO)','Desarmador plano marca Husky fabricado de Cromo-Vanadio con sistema de imán en punta.'),
(3,1,5,'DESARMADOR HUSKY (CRUZ)','Desarmador de cruz marca Husky fabricado de Cromo-Vanadio con sistema de imán en punta.'),
(3,1,6,'DESARMADOR STANLEY (PLANO)','Desarmador plano chico, mediano y largo, marca Stanley.'),
(3,1,7,'DESARMADOR STANLEY (CRUZ)','Desarmador plano de 1 pt y 2 pt marca Stanley.'),
(3,1,8,'DESARMADOR PUNTAS INTERCAMBIABLES','Desarmador con 6 puntas intercambiables.'),
(3,1,9,'ESTUCHE DESARMADOR RELOJERO','Estuche con 6 piezas marca Husky. Desarmador plano. El material 319 tiene dos valores, hay que cambair el codigo de los elementos'),
(3,2,1,'JUEGO DE PUNTAS PLANAS (KIT HERRAMIENTA)','10 puntas para destornillador tipo desarmador plano, marca Crescent.'),
(3,2,2,'JUEGO DE PUNTAS ESTRELLA (KIT HERRAMIENTA)','10 puntas para destornillador tipo estrella, marca Crescent.'),
(3,2,3,'JUEGO DE PUNTAS HEXÁGONO (KIT HERRAMIENTA)','10 puntas para destornillador tipo hexágono, marca Crescent.'),
(3,2,4,'JUEGO DE PUNTAS CRUZ (KIT HERRAMIENTA)','10 puntas para destornillador tipo cruz, con 2 daptadores, marca Crescent.'),
(3,3,1,'LLAVE, SAE Y METRIC','Llave de varias medidas SAE y Metric; marca Crescent (Kit de Herramienta).'),
(3,3,2,'DADO','Dado de varias medidas SAE y Metric, marca Crescent (Kit de Herramienta).'),
(3,3,3,'MATRACA','Matraca de varias medidas SAE y Metric, marca Crescent (Kit de Herramienta).'),
(3,3,4,'PINZAS','Pinzas de punta y pinzas de corte (Kit de Herramienta).'),
(3,3,5,'EXTENSIÓN','Extensión para matraca, marca Crescent (Kit de Herramienta).'),
(3,3,6,'ADAPTADOR SPARK PLUG SOCKET','Adaptador marca Crescent.'),
(3,4,1,'JUEGO DE LLAVES MÉTRICA','8 llaves Allen punta métrica marca Crescent (Kit de Herramienta). Juego de llaves Métrica Toolcraft.'),
(3,4,2,'JUEGO DE LLAVES ESTÁNDAR (KIT HERRAMIENTA)','8 llaves Allen punta estándar marca Crescent.'),
(3,5,1,'MOTOTOOL','MOTOTOOL DREMEL, Herramienta rotatoria múltiple, con velocidad variable de 5, 000 a 35, 000 RPM, incluye caja de portaherramientas.'),
(3,6,1,'SEGUETA CON PERNO','Seguetas con perno de 127 mm para Sierra Eléctrica.'),
(3,6,2,'SEGUETA SIN PERNO','Seguetas sin perno para Sierra Eléctrica.'),
(3,7,1,'MEGA JUEGO DE ACCESORIOS DIVERSOS','Juego de accesorios para diversos usos para DREMEL 220 piezas.'),
(3,7,2,'KIT DE BROCAS SKIL','Juego de Brocas para Taladro.'),
(3,8,1,'TALADRO DE COLUMNA DE BANCO','Taladro de columna de banco marca Knova, motor 1/4 HP, 120V, 60 HZ.'),
(3,8,2,'SIERRA CALADORA','Sierra Caladora marca Knova con motor 1/10 HP, 120V, 60 Hz.');

-- Insertar en tipo de material 4, Equipo de computo
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(4,1,1,'MONITOR EN ESTACIÓN DE CALIDAD','Monitor tipo LCD alta definición (HD) de 19” con desplazamientos mecánicos.'),
(4,1,2,'MONITOR EN ESTACIÓN DE TRABAJO','Monitor LCD HD de 26": Pantalla HDTV Widescreen 420p -720p, área visible de 26" en diagonal, resolución máxima: 1280X720 Píxeles en 16 millones de colores y superficie de pantalla antireflejante, marca LG.'),
(4,1,3,'MONITOR EN ESTACION DE REGISTRO Y MONITOREO','Monitor LCD de 19” de alta definición.'),
(4,1,4,'MONITOR ESTACION DE DISEÑO DE LUGAR DE TRABAJO','Monitor LCD de 23” de HD.'),
(4,1,5,'MONITOR CON PROCESADOR LENOVO, ETIQUETADORA','Monitor con procesador integrado marca Lenovo, Windows 7 con procesador Vision AMD.'),
(4,2,1,'SERVIDOR ESTACIÓN DE CALIDAD','Unidad Procesadora de Datos: Procesador, plataforma Windows, Memoria RAM a 2GB, disco duro de 160GB, unidad combo CD-ROM DVD- ROM, incluye el software MINITAB 16, marca Acteck.'),
(4,2,2,'SERVIDOR ESTACIÓN DE TRABAJO','Unidad Procesadora de datos: Procesador, plataforma Windows, Memoria RAM a 2GB, disco duro de 160GB, unidad combo CD-ROM DVD-ROM, marca Acteck.'),
(4,2,3,'SERVIDOR ESTACIÓN DE REGISTRO Y MONITOREO','Unidad de recopilación y análisis de la información, plataforma Windows, memoria 2 GB, disco duro de 160 GB, unidad combo CD-ROM, DVD-ROM, RW, marca Acteck.'),
(4,2,4,'SERVIDOR ESTACIÓN DISEÑO DE LUGAR DE TRABAJO','Procesador de cómputo, unidad de adquisición y Procesamiento de datos; procesador, memoria RAM,plataforma Windows, disco duro, unidad de combo CD-ROM/DVD-ROM, marca Acteck.'),
(4,2,5,'SERVIDOR DE VIDEO','Sistema de monitoreo digital, grabación y reproducción de video.'),
(4,3,1,'TECLADO ESTACIÓN DE CALIDAD','Teclado Micrsoft, alámbrico, con entrada USB.'),
(4,3,2,'TECLADO ESTACIÓN DE TRABAJO','Teclado Micrsoft, alámbrico, con entrada USB.'),
(4,3,3,'TECLADO DE ESTACIÓN DE REGISTRO Y MONITOREO','Teclado Micrsoft, alámbrico, con entrada USB.'),
(4,3,4,'TECLADO ESTACIÓN DE DISEÑO DE LUGAR DE TRABAJO','Teclado Microsoft, alámbrico.'),
(4,3,5,'TECLADO ADICIONAL','Teclado Microsoft, alámbrico.'),
(4,3,6,'TECLADO LENOVO PARA ETIQUETADORA','Teclado Lenovo alámbrico, con entrada USB.'),
(4,4,1,'MOUSE ESTACIÓN CALIDAD','Mouse marca Microsoft, utilizado en las Estaciones de Calidad.'),
(4,4,2,'MOUSE ESTACIÓN DE TRABAJO','Mouse que se utiliza para la toma de tiempo y respuesta.'),
(4,4,3,'MOUSE ESTACIÓN DE REGISTRO Y MONITOREO','Mouse óptico Microsoft, alámbrico.'),
(4,4,4,'MOUSE ESTACIÓN DE DISEÑO DE LUGAR DE TRABAJO','Mouse óptico Microsoft, alámbrico.'),
(4,4,5,'MOUSE ALAMBRICO LENOVO PARA ETIQUETADORA','Mouse.'),
(4,5,1,'PROYECTOR LCD','Proyector LCD marca Hitachi incluye cable de alimentación y cable para video.'),
(4,5,2,'CABLE ALIMENTACIÓN','Cable de alimentación.'),
(4,5,3,'CABLE VGA','Cable VGA para monitor.'),
(4,6,1,'CONTROL REMOTO','Control remoto para pantalla LCD.'),
(4,7,1,'ETIQUETADORA','Etiquetadora marca Zebra GK420t.'),
(4,7,2,'LECTOR LASER','Lector láser modelo STB2000-C1.'),
(4,8,1,'LLAVE GABINETE DE BALANCEO DE LINEA','LLAVE GABINETE DE BALANCEO DE LINEA'); -- Este codigo no estaba en la tesis

-- Insertar en tipo de material 5, Material de practicas
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(5,1,1,'JUEGO LEGO 650 PIEZAS','Juegos de ladrillo tipo lego con 650 piezas.'),
(5,1,2,'JUEGO LEGO 500 PIEZAS','Juegos de ladrillo tipo lego con 500 piezas.'),
(5,1,3,'JUEGO LEGO 950 PIEZAS','Juegos de ladrillo tipo lego con 950 piezas.'),
(5,2,1,'CARRITO DE METAL','Carritos de metal para ensamblar y desensamblar con 60 piezas c/u, marca Kustom metal, incluye desarmador y llave española.'),
(5,2,2,'CARRITO DESARMABLE DE PLÁSTICO','Carrito de plástico desarmable con 25 piezas.'),
(5,3,1,'INTERRUPTOR SENCILLO CON 10 PIEZAS','Interruptor sencillo de 10V hasta 127V marca Cooper.'),
(5,3,2,'CLAVIJAS','Clavija de 10A - 125V.'),
(5,3,3,'CHALUPA','Chalupas con 2 salidas.'),
(5,3,4,'MOTOR ELÉCTRICO','Motor eléctrico marca AirMovent de 120V 60Hz.'),
(5,3,5,'CONECTOR ELÉCTRICO','Conectores eléctricos consta de las siguientes piezas, rondana, tuerca grande, empaque de plástico, reductor de plástico.'),
(5,3,6,'CAMBIO DE VELOCIDADES','Cambio de velocidades para bicicleta con 27 piezas.'),
(5,3,7,'MAQUINA DE COSER','Máquina de coser manual.'),
(5,4,1,'BIN','Bin para almacenamiento de material.'),
(5,4,2,'BIN ADHERIBLE','Bin adherible para almacenamiento de material.'),
(5,4,3,'CONJUNTO DE BINES','6 Bines en conjunto color azul.'),
(5,5,1,'AUDÍFONOS','Diadema auditiva profesional con peso ligero y diseño ajustable (1 analista - 1 operario).'),
(5,6,1,'JUEGO MINI GOLF','Juegos de mini golf para prácticas de control de calidad.'),
(5,6,2,'SANDWICHERA','Sandwichera marca Taurus diseño compacto con 750W.'),
(5,6,3,'EXPRIMIDOR DE JUGOS','Exprimidor marca Timco.'),
(5,7,1,'TABLA CON CLIP','Tabla con clip tamaño carta.'),
(5,8,1,'FIGURAS DIDÁCTICAS','Figuras didácticas de la estación de diseño de lugar de trabajo con sistema adherible de imán.'),
(5,9,1,'CAUTÍN','Cautín tipo lápiz y pistola de 30W con tapa protectora.');

-- Insertar en tipo de material 6, Manuales - software
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material, descripcion) VALUES
(6,1,1,'MANUAL DE PRÁCTICAS DEL LABORATORIO DE INGENIERÍA DE MÉTODOS','Manual de las prácticas del laboratorio que se realizan en Laboratorio Estudio del Método del Trabajo y Laboratorio Estudio de la Medición del Trabajo.'),
(6,1,2,'MANUAL DE USUARIO "ESTACIÓN DE ANÁLISIS ANTROPOMÉTRICO BIOMECÁNICO Y ERGONÓMICO"','Manual didáctico de Estación de Análisis Antropométrico, Biomecánico y Ergonómico.'),
(6,1,3,'MANUAL DE USUARIO "ESTACIÓN DE DISEÑO DE LUGAR DE TRABAJO"','Manual de usuario de Estación de Diseño y Lugar de Trabajo.'),
(6,1,4,'MANUAL DE ARMADO DE MOTOR','Manual que muestra el procedimiento del armado de motor.'),
(6,2,1,'GUÍA DE APRENDIZAJE "GRUPOS DE TRABAJO CON PROPÓSITO DEDICADO"','Pedagógico de los Grupos de Trabajo Dedicado.'),
(6,2,2,'GUÍA DE APRENDIZAJE "ESTACIÓN DE CALIDAD"','Pedagógico de la Estación de Calidad.'),
(6,2,3,'GUÍA DE APRENDIZAJE "ESTACIÓN DE ANÁLISIS ANTROPOMÉTRICO, BIOMECÁNICO Y ERGONÓMICO"','Manual didáctico de Estación de Análisis Antropométrico, Biomecánico y Ergonómico.'),
(6,2,4,'GUÍA DE APRENDIZAJE "ESTACIÓN DE DISEÑO DE DISEÑO Y LUGAR DE TRABAJO"','Manual didáctico Estación de Diseño y Lugar de Trabajo.'),
(6,3,1,'GUÍA PRACTICA "GRUPOS DE TRABAJO CON PROPÓSITO DEDICADO"','Guía práctica de Grupos de Trabajo.'),
(6,3,2,'GUÍA PRACTICA "ESTACIÓN DE CALIDAD"','Guía Práctica de estación de Calidad.'),
(6,4,1,'BITÁCORA DE USO DE MATERIALES Y CATALOGO DE EQUIPO','Muestra el uso que se le da a cada material del laboratorio por trimestre.'),
(6,5,1,'MANUALES','Cajón 1: Manual Teclado Microsoft, Manual Teclado USB, Instructivo Carros de Metal, Manual Cronómetro Sport-Line, Manual Cronómetro Extech, Documentos Cámara Termográfica
Cajón 2: Manual Medidor de Sonido, Manual Medidor de Luminosidad, Manual cinta métrica, Manual Báscula, Manual Medidor de alturas, Manual Micrómetro, Manual Taladro de Columna, Programa de Capacitación');

-- Insertar en tipo  de material 7, Equipo movil
INSERT INTO materiales (tipo_de_material_id, digito_5, digito_6, nombre_del_material,descripcion) VALUES
(7,1,1,'MESA DE TRABAJO OPERADOR','Mesa del operario: Mesa ergonómica con dimensiones de 110x65x89 [cm] con un nivelador para cada pata de la mesa y sistema de desplazamiento.'),
(7,1,2,'MESA DE TRABAJO ANALISTA','Mesa del analista: Mesa ergonómica con dimensiones de 110x65x89 [cm] con un nivelador para cada pata de la mesa y sistema de desplazamiento.'),
(7,1,3,'ESTACION DE TRABAJO MOVIL','Estación de Trabajo fabricada con perfil de aluminio de 45X45 [cm] con sistema de desplazamiento y lámpara de iluminación.'),
(7,1,4,'ESTACION DE CALIDAD','Estación elaborada con material de aluminio extruido, dimensiones 150x60x89 [cm]. Superficie de panel laminado con cajón de almacenamiento, sistema de desplazamiento y sistema de ventilación.'),
(7,1,5,'ESTACION DE DISEÑO DE LUGAR DE TRABAJO','Estación de diseño de lugar de trabajo, elaborada con perfil de aluminio extruido, superficie de panel laminado de 138x150x200 [cm] con sistema de desplazamiento.'),
(7,1,6,'ESTACION DE REGISTRO Y MONITOREO','Estación de registro y monitoreo mediante software que proporciona las medidas antropométricas, con fotografías del cuerpo de la persona. Elaborada con perfil de aluminio, con superficie de panel y con dimensiones de 150x70x83 [cm].'),
(7,1,7,'MESA','Mesa con superficie aglomerada.'),
(7,1,8,'SILLA','Silla para escritorio.'),
(7,2,1,'ESTACION DE ANTROPOMETRIA DE ANCHURAS','Estación de Antropometría para medir anchuras, cuenta con sistema de desplazamiento elaborada con perfil de aluminio, con piso laminado de alta resistencia y con dimensiones de 158x158x275 [cm].'),
(7,2,2,'ESTACION DE ANTROPOMETRIA DE ALTURAS','Estación de Antropometría para medir alturas, cuenta con sistema de desplazamiento, elaborada con perfil de aluminio, con piso laminado de alta resistencia y dimensiones de 15x158x266 [cm].'),
(7,2,3,'ESTACION DE ANTROPOMETRIA MIXTA','Estación de Antropometría mixta, permite realizar mediciones de tres formas distintas, sentado, de forma erguida y de forma supina. Cuenta con sistema de desplazamiento, elaborada con perfil de aluminio, con piso laminado de alta resistencia y con dimensiones 208x208x266 [cm].'),
(7,3,1,'BANCO ERGONOMICO','Asiento ergonómico con respaldo de metal.'),
(7,3,2,'ASIENTO ERGONOMICO FIJO','Asiento con elevador neumático ajustable y respaldo ajustable, base giratoria 360°, estática.'),
(7,3,3,'ASIENTO ERGONOMICO MOVIL','Asiento con elevador neumático ajustable y respaldo ajustable, base giratoria 360°, ruedas antiestáticas.'),
(7,4,1,'CARRO MOVIL','Carrito tipo industrial para desplazar material (rack), fabricación en perfil de aluminio.'),
(7,4,2,'BANDA TRANSPORTADORA','Transportador de Banda Lisa con motor de 1/8 hp hasta 173 rpm, soporte de perfil de aluminio.'),
(7,4,3,'PIZARRON','Pizarrón blanco para plumón, fabricación en perfil de aluminio con sistema de desplazamiento.'),
(7,5,1,'TORRETA','Mueble para CPU, cabina y pantalla LCD, con interruptor de encendido eléctrico.');