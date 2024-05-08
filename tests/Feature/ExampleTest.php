<?php

namespace Tests\Feature;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // Student Test
    public function test_Get_Student()
    {
        // Call the api for the test
        $response = $this->get('api/student');

        if (empty($response)) {
            // if the result return null data
            $this->fail('La respuesta está vacía');
        } elseif ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }

        // Return if this return 
        $response->assertStatus(200);
    }


    // Create The student
    public function test_Create_Student(){
        // Get the user with the correct permission
        $user = User::where('email', 'teacher@gmail.com')->first();

        // User the User to autenticate
        Sanctum::actingAs($user);

        $CreateTest = ([
            'name' => 'Zhiou',
            'surname' => 'Zhu',
            'password' => '12345678',
            'teacher_id' => '1',
            'email' => 'zhu2499684152@gmail.com',
            'address' => 'null',
            'image' => 'null',
            'license_id' => '1',
        ]);

        $request = new Request($CreateTest);
        // Call the api to test

        // Pass the params as request to run the api
        $response = $this->post('api/student/create', $request->toArray());

        // If the result comming correct (201 means the creation is being correctly executed)
        $response->assertStatus(200);

        if ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }
    }

    public function test_Get_Specific_Student()
    {
        // Get the user with the correct permission
        $user = User::where('email', 'teacher@gmail.com')->first();

        // User the User to autenticate
        Sanctum::actingAs($user);
    
        // Call the api to test
        $response = $this->get('api/student/4');

        if (empty($data)) {
            // if the result return null data
            $this->fail('La respuesta está vacía');
        } elseif ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }

        // Verify the result has eject correctly
        $response->assertStatus(200);

        // Get the content of the $response
        $response->getContent();

    }

     // Test the edit student function
     public function test_Edit_Student(){
        // Get the user with the correct permission
        $user = User::where('email', 'teacher@gmail.com')->first();

        // User the User to autenticate
        Sanctum::actingAs($user);

        // Request Params to edit the student
        $editTest = ([
            'name' => 'Algo',
            'surname' => 'Nuevo',
            'password' => '1234567',
            'teacher_id' => '1',
            'email' => 'zhiou@gmail.com',
            'address' => 'null',
            'image' => 'null',
            'license_id' => '1',
        ]);

        $request = new Request($editTest);
        // Call the api to test

        // Pass the params as request to run the api
        $response = $this->post('api/student/update/4', $request->toArray());

        // Find the student with the id
        $student = Student::find(1);
        // Search the student in Users table and update the datas
        $student->User()->update(['email' => $editTest['email'], 'password' => $editTest['password']]);

        // If the result comming correct 
        $response->assertStatus(200);

        if ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }elseif ($response->status() === 405) {
            // The method is not allow to call the resouce
            $this->fail('Estas usando el metodo incorrecta');
        }elseif ($response->status() === 409) {
            // There a conflict that cannot execute the action
            $this->fail('Hay conflicto al enviar y no ha podido finalizar el accion');
        }elseif ($response->status() === 422) {
            // The params you provided have some error
            $this->fail('Hay fallo en parametro enviado');
        }elseif ($response->status() === 429) {
            // Did too many request in short time
            $this->fail('has hecho demasiado solicitud en un determinado de tiempo');
        }elseif ($response->status() === 502) {
            // None Exist GateWay
            $this->fail('Fallo en puerta de enlace');
        }elseif ($response->status() === 503) {
            // Service Unavailable
            $this->fail('El servicio que estas llamando no existe');
        }
    }

    // Destroy an Student
    public function test_Destroy_Student(){
        // Get the user with the correct permission
        $user = User::where('email', 'teacher@gmail.com')->first();

        // User the User to autenticate
        Sanctum::actingAs($user);

        $studentDelete = 4;

        // Delete this student
        $response = $this->delete('api/student/' . $studentDelete);

         // Find the student with the id
         $User = User::find($studentDelete);
         // Search the student in Users table and update the datas
         $User->delete();

         // Return if the delete action is correctly executed
        $response->assertStatus(200);
    }


    // Teacher Test
    public function test_Get_Teacher()
    {   
        // Call the api for the test
        $response = $this->get('api/teacher');


        if (empty($response)) {
            // if the result return null data
            $this->fail('La respuesta está vacía');
        } elseif ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }

        // Return if this return 
        $response->assertStatus(200);
    }





    // License Test
    public function test_Get_License()
    {
        // Call the api for the test
        $response = $this->get('api/license');

        if (empty($response)) {
            // if the result return null data
            $this->fail('La respuesta está vacía');
        } elseif ($response->status() === 403) {
            // if result has no autorizaded
            $this->fail('La solicitud no está autorizada');
        } elseif ($response->status() === 404) {
            // if didn't found the resource
            $this->fail('El recurso no fue encontrado');
        }

        // Return if this return 
        $response->assertStatus(200);
    }



    // Test Test

}
