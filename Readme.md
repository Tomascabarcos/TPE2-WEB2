    API de jugadores de futbol

    Esta api-rest sirve  para manejar el crud de la tabla Jugadores_futbol de la base de datos->(deportes).

    IMPORTAR LA BASE DE DATOS

    importar desde PHPMyAdmin (o cualquiera) BD/deportes.php

    Y con Postman hacemos la prueba de los endpoint de la api.

    Endpoints son las url de una api.

    Ejemplo  de un  ENDPOINT : HTTP://WWW.EXAMPLE.COM/API/USUARIO/5

    Para poder acceder a los endpoint se necesita: 

    Recurso: Cualquier informacion que se pueda nombrar puede ser un recurso.
    METODO HTTP: Se utilizan metodos HTTP de manera explicita  junto 
    a cada recurso para solicitar un servicio deseado: (GET,POST,PUT,DELETE).



    ENDPOINTS DE JUGADORES: 
    
    GET/JUGADORES
    METODOS GET Y ENDPOINT GET-> : http://localhost/proyecto2/api/jugadores/
    Me trae una coleccion entera de jugadores,con sus detalles.
    Y nos muestra un  codigo de respuesta para ver el codigo ir a la (SECCION DE ERRORES)

    ----------------------------------------------------
    GET/JUGADORES/ID 
    METODOS GET y ENDPOINT GET-> : http://localhost/proyecto2/api/jugadores/1
    Accede al detalle de un  jugador a través del id  que tenga ese jugador , para ver que id tiene cada jugador
    podra encontrarlo en GET/JUGADORES.  Y nos muestra un  codigo de respuesta
    para ver el codigo ir a la (SECCION DE ERRORES)
    ------------------------------------------------------
    Parametros GET

    ORDENAMIENTO DE COLECCION ENTERA DE JUGADORES
    ------------------------------------------------------
    Podemos escribir parametros al servicio GET , En este caso para traerme una
    coleccion entera de jugadores
    ordenandolos de manera ascendente o descendente, segun su prioridad y orden.
    
    Agregando el signo? , prioridad y  orden en la url , prioridad tiene que ser
    igual a unos de los campos de la tabla jugadores_futbol
    y el valor de orden lo puede elegir el programador (asc o desc).

    EJ: http://localhost/proyecto2/api/jugadores?prioridad=ID&orden=desc

    (Prioridad=ID y orden=desc) me trae todos los campos con id en orden descendete
    en especifico y el resto de campos ya que estoy solicitando una coleccion
    entera de jugadores.


    IMPORTANTE: 
    Si omite al agregar el parametro prioridad o orden , te 
    trae la coleccion entera de jugadores de forma ascendente.Complete todos los parametros.

    En el caso de  al agregar valores a los parametros,  y no son los valores de
    la columnas saldra un error.Status-message(estado de mensaje de error)->ingresar correctamente
    los valores de prioridad o orden.acompañado con un Status-Code( Codigo de respuesta)
    para saber el codigo de respuesta ir a la (SECCION DE ERRORES).

    
     .
 

    ----------------------------------------------------------------------------------------------

    POST/JUGADORES/

    METODO  POST Y ENDPOINT-POST-> http://localhost/proyecto2/api/jugadores

    Sirve para agregar un jugador,  en la parte de body del postman
    poner en formato raw y  hay que escribir un objeto json (donde tenemos que asignar todos los campos
    de la tabla jugadores_futbol) y por cada campo agregar un valor a eleccion del programador y darle a enviar.
    Una vez modificado podemos ver   un codigo de respuesta acompaño con un mensaje que se agrego exitosamente
    el jugador para ver los codigos de repuesta ir a la  (SECCION DE ERRORES).
    
    Una vez agregado  se puede ver ese  jugador haciendo una petición a un servicio (GET/jugadores)
    o respectivamente (GET/jugadores/ID) para poder ver solamente ese jugador agregado.

    NOTA: No es necesario agregar el campo ID ya que por cada recurso que agregemos 
    se asigna solo el campo ID con su valor.


    CAMPOS DE LA TABLA JUGADORES_FUTBOL
    NOMBRE
    NACIONALIDAD
    POSICION
    ID_EQUIPO
    
    EJEMPLO AL ESCRIBIR EL JSON: 
    {
        NOMBRE: TOMAS,
        ID_EQUIPO: 6
    }

    IMPORTANTE :

    Al campo id_equipo asignarles valores( 6 , 7 , 8) para que a la hora de agregar un recurso 
    con esos valores  poder ver los cambios en el campo equipo ya que estan relacionados esos campos.
    el campo equipo es un campo extra que se puede junto con sus cambios
    cambios solicitando el servicio  GET/JUGADORES   GET/JUGADORES/ID.



    EJ:

    id equipo          equipo
    6            ->    Real-madrid
    7            ->    Manchester-united
    8            ->    PSG

    Y si no se asigna esos valores al campo id_equipo, no se va a poder  agregar un jugador , ya que los valores 6,7,8 
    dependen de que cambie tambien los valores del campo equipo.

    ----------------------------------------------------------------------------------------------------------
    DELETE/JUGADORES/ID
    METODO DELETE Y ENDPONT-DELETE-> http://localhost/proyecto2/api/jugadores/1
    Borra un jugador en especifico , para poder borrar ese jugador se
    necesita conocer que id que tiene ese jugador .Una vez borrado el jugador  nos muestra un codigo 
    de respuesta acompaño con un mensaje que se borro exitosamente
    para ver los codigos de repuesta ir a la  (SECCION DE ERRORES).

    Para confirmar que se borro el jugador solicitar el servicio  (GET/jugadores).
    
    REFERENCIA : (GET/jugadores) , para saber que id tiene cada jugador.

    ----------------------------------------------------------------------------------------------------------
    PUT/JUGADORES/ID

    METODO PUT Y ENPOINT-PUT-> http://localhost/proyecto2/api/jugadores/1

    Con el metodo PUT y el recurso jugadores y el ID.

    Sirve para poder modificar  un jugador hay que conocer que id tiene
    ese jugador , una vez que sabemos que id tiene ese jugador en la parte de body del postman poner en formato
    raw y hay que escribir un objeto json,(donde tenemos que asignar  todos los campos de la tabla jugadores_futbol)
    y por cada campo agregar un valor a eleccion del programador   y darle a enviar.
    Una vez modificado podemos ver   un codigo de respuesta acompaño con un mensaje que 
    se modifico exitosamente el jugador para ver los codigos de repuesta ir a la  (SECCION DE ERRORES)
    
    Para confirmar que jugador se modifico haciendo una petición a un servicio (GET/jugadores)
    o (GET/jugadores/ID) para poder ver solamente ese jugador modificado.

    CAMPOS DE LA TABLA JUGADORES_FUTBOL
    NOMBRE
    NACIONALIDAD
    POSICION
    ID_EQUIPO


    EJEMPLO AL ESCRIBIR EL JSON: 
    {
        NOMBRE: TOMAS,
        ID_EQUIPO: 7
    }

    IMPORTANTE : 

    Al campo id_equipo asignarles valores( 6 , 7 , 8) para que a la hora de modificar un recurso con esos
    valores  poder ver los cambios en el campo equipo ya que estan relacionados esos campos.
    el campo equipo es un campo extra que se puede junto con sus cambios
    cambios solicitando el servicio  GET/JUGADORES  o GET/JUGADORES/ID.


    EJ:

    id equipo          equipo
    6            ->    Real-madrid
    7            ->    Manchester-united
    8            ->    PSG

    Y si no se asigna esos valores al campo id_equipo, no se va a poder  modificar un recurso , ya que los valores 6,7,8 
    dependen de que cambie tambien los valores del campo equipo.

    ----------------------------------------
    SECCION DE ERRORES   

    CODIGOS DE RESPUESTA HTPP

    200 OK
    Esta respuesta se da cuando el usuario hizo una solicitud y tuvo exito

    201 CREATED

    Esta respuesta cuando se mofico exitosamente un recurso o ej:jugador exitosamente.

    400 BAD REQUEST
    Esta respuesta indica que el servidor no pudo interpretar la solicitud dada una sintaxis inválida del parte del cliente.

    404 NOT FOUND
    Indica que una página buscada no puede ser encontrada aunque la petición este correctamente hecha.

    500 INTERNAL SERVER ERROR
    Indica que el servidor encontró una condición inesperada que le impide completar la petición
    



   

    
    
    
    

    