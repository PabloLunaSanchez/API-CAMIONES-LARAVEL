# api-trucktracker :truck:
 api para la app de tracktrucker


# Guía Rápida de Comandos Laravel :nerd_face: :point_up:
Esta guía proporciona una descripción de los comandos más comunes que se utilizan en un proyecto de Laravel.

# Comandos de Migración
### 1. php artisan migrate
Este comando se utiliza para ejecutar todas las migraciones pendientes en tu proyecto de Laravel. Las migraciones son archivos que definen la estructura de la base de datos, 
como la creación de tablas y la adición de columnas a esas tablas. 
Cuando ejecutas este comando, Laravel aplicará todas las migraciones que aún no se han ejecutado en la base de datos

```
php artisan migrate
```

### 2. php artisan migrate table_nombre_create
Este comando se utiliza para generar una nueva migración con un nombre específico. Las migraciones son archivos que se encuentran en el directorio database/migrations y 
definen la estructura de la base de datos. El argumento table_nombre_create especifica el nombre de la tabla que deseas crear en la migración.
```
php artisan migrate:make table_nombre_create
```

### 3. php artisan migrate:refresh
Este comando deshace todas las migraciones anteriores y luego las vuelve a ejecutar. Es útil cuando necesitas restablecer la base de datos a su estado inicial, 
eliminando todos los datos y volviendo a crear la estructura de la base de datos.

```
php artisan migrate:refresh
```


### 4. php artisan serve
Este comando inicia el servidor de desarrollo de Laravel. Te permite ejecutar tu aplicación Laravel en un entorno local y acceder a ella a través de un navegador web. 
El servidor se ejecutará en http://localhost:8000 de forma predeterminada.

```
php artisan serve
```


### 5. php artisan make:controller API/PersonaController --api
 Este comando se utiliza para generar un controlador en tu proyecto Laravel. El argumento API/PersonaController indica que el controlador se ubicará en el directorio app/Http/Controllers/API y se llamará PersonaController. 
 La opción --api indica que el controlador se generará con métodos y características específicas para ser utilizado en una API.
```
php artisan make:controller API/PersonaController --api
```

### 6. php artisan make:request GuardarPersonaRequest o ActualizarPersonaRequest (Para crear archivos de solicitud de validación)
Este comando de Artisan se utiliza para generar un archivo de solicitud de validación que permite definir reglas de validación para los datos enviados a través de formularios o solicitudes HTTP en una aplicación Laravel. 
La solicitud de validación es una parte esencial para garantizar que los datos ingresados por los usuarios cumplan con ciertos criterios antes de ser procesados o almacenados en la base de datos. En este caso, "GuardarPersonaRequest" 
sugiere que este archivo de solicitud se utiliza para validar los datos relacionados con la acción de guardar una persona en el sistema.

```
php artisan make:request GuardarPersonaRequest
```

```PHP
class GuardarPersonaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiar a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "nombre" => "required",
            "correo" => "required|email|unique:personas,correo", // unique:personas,correo
            "telefono" => "required|numeric",
            "edad" => "required|numeric",
            "categoria" => "required"
        ];
    }
}
```
Ejemplos de validadación para la tabla personas, considera que el campo correo sea unico y este asociado a la id de la persona.

