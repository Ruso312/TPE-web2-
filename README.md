# Trabajo Practico Especial de Web 2

**:computer:Desarrolladores:**
* Dacenzo Marco
  *  :email:: marcodace00@gmail.com
* Santillan Ramos Patricio
  *  :email:: Patricio21102000@hotmail.com
    
## Descripcion del proyecto
El presente proyecto representa una aplicacion para el control del progreso de un *Cliente* en un gimnasio, llevando a cabo un seguimiento mediante los ejercicios realizados, este usuario podra modificar, agregar o eliminar los ejercicios a medida que lo vea necesario.
Estos ejercicios se almacenan en una tabla llamada *Ejercicio* donde se incluye la clave foranea **(Foreign Key)** estableciendo asi la relacion **1** a **n**, esto quiere decir que para cada *Cliente* se le puede asignar uno o mas ejercicios.


# Diagrama *Entidad-Relacion* de la base de datos del proyecto:
![image](https://github.com/user-attachments/assets/a674fa89-147d-4522-abff-513f4bd4c3e7)



### Explicacion de las tablas involucradas
**Admin**
 La tabla de admin esta creada para separar las responsabilidades que tienen para con la pagina los usuarios comunes(Clientes).
 
**Cliente:**
  La tabla Cliente simula un usuario que este utilizando la aplicacion que ingresara los datos de los ejercicios que va a realizar, este consta de:
<pre>  
  - id: Identificador unico auto incremental. 
  - nombre: Nombre del Cliente.  
  - email: Email del Cliente.  
</pre>  
**Ejercicio:**
   Esta tabla consta de las caracteristicas basicas del ejercicio que se va a implementar para la realizacion del ejercicio, se pueden obvservar datos, ademas de los datos con nombres implicitos (ej. nombre_ejercicio, musculo_implicado, etc.) como:
<pre>
  - id: Identificacion unica del ejercicio.
  - cliente_id: Clave foranea que vincula un Cliente con un Ejercicio dado.
</pre>

### Como acceder a la manipulacion de datos
 Para acceder a la pagina y poder modificar datos, existe una cuenta para testear esto.
 En el Header de la pagina se encuentra un boton de Login, al apretar en el nos envia a un formulario de Login, ahi se debera de ingresar los siguientes datos:
 <pre>
  -Email: webadmin@gmail.com
  -Contraseña: admin
</pre>
 ### Navegacion
 La navegacion es demaciado intuitiva, simplemente con los enlaces a donde llevan los diferentes links y estando logeado se puede manipular al total la pagina.
 De querer movilizarce por url, estos son los enlaces disponibles:
<pre>
 -Home de la pagina: /home
 -Eliminar un cliente: /delete/cliente/[ID_CLIENTE]
 -Eliminar un ejercicio: /delete/ejercicio/[ID_EJERCICIO]
 -Editar un cliente: /showEditar/cliente/[ID_CLIENTE]
 -Editar un ejercicio: /showEditar/ejercicio/[ID_EJERCICIO]
 -Detallar los clientes: /detalle/cliente
 -Detallar los ejercicios: /detalle/ejercicio
</pre>

 
