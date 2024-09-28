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
![image](https://github.com/user-attachments/assets/9113c7a8-1fb1-4182-bbfb-531693f88754)



### Explicacion de las tablas involucradas
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
-