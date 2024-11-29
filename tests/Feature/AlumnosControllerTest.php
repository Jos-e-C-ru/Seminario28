<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AlumnosControllerTest extends TestCase
{

    /** @test */
        public function puede_mostrar_detalles_de_un_alumno()
        {
            $alumno = Alumno::factory()->create();
            $response = $this->get("/alumnos/{$alumno->id}");
            $response->assertStatus(200); // Verifica que la solicitud fue exitosa
            $response->assertSee($alumno->nombre);
            $response->assertSee($alumno->apellido);
        }
    
     /** @test */
        public function puede_actualizar_un_alumno()
        {
     
             $alumno = Alumno::factory()->create([
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'email' => 'juan.perez@example.com',
                'edad' => 20,
            ]);
    
    $response = $this->put("/alumnos/{$alumno->id}", [
        'name' => 'Carlos',
        'apellido' => 'García',
        'email' => 'carlos.garcia@example.com',
        'edad' => 22,
    ]);
}

      /** @test */
      public function puede_eliminar_un_alumno()
      {
          $alumno = Alumno::factory()->create();
          $response = $this->delete("/alumnos/{$alumno->id}");
          $response->assertRedirect('/alumnos');
          $this->assertDatabaseMissing('alumnos', [
              'id' => $alumno->id,
          ]);
      }

 }