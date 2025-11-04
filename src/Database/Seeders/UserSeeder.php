<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use IncadevUns\CoreDomain\Models\StudentProfile;
use IncadevUns\CoreDomain\Models\SupportProfile;
use IncadevUns\CoreDomain\Models\TeacherProfile;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 🧩 GRUPO 03 - SOPORTE Y ADMINISTRACIÓN
        $adminRole = Role::create(['name' => 'admin']);
        $supportRole = Role::create(['name' => 'support']);
        $infrastructureRole = Role::create(['name' => 'infrastructure']);
        $securityRole = Role::create(['name' => 'security']);
        $academicAnalystRole = Role::create(['name' => 'academic_analyst']);
        $webRole = Role::create(['name' => 'web']);

        // 🧩 GRUPO 06 - AUDITORÍA Y ENCUESTAS
        $surveyAdminRole = Role::create(['name' => 'survey_admin']);
        $auditManagerRole = Role::create(['name' => 'audit_manager']);
        $auditorRole = Role::create(['name' => 'auditor']);

        // 🧩 GRUPO QUEZADA - RECURSOS HUMANOS Y FINANZAS
        $humanResourcesRole = Role::create(['name' => 'human_resources']);
        $financialManagerRole = Role::create(['name' => 'financial_manager']);
        $systemViewerRole = Role::create(['name' => 'system_viewer']);
        $enrollmentManagerRole = Role::create(['name' => 'enrollment_manager']);
        $dataAnalystRole = Role::create(['name' => 'data_analyst']);

        // 🧩 GRUPO HURTADO - MARKETING
        $marketingRole = Role::create(['name' => 'marketing']);
        $marketingAdminRole = Role::create(['name' => 'marketing_admin']);

        // 🧩 GRUPO VÁSQUEZ - ACADÉMICO
        $teacherRole = Role::create(['name' => 'teacher']);
        $studentRole = Role::create(['name' => 'student']);

        $userModelClass = config('auth.providers.users.model', 'App\Models\User');

        $superAdmin = $userModelClass::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@incadev.com',
            'password' => Hash::make('password'),
            'dni' => '00000001',
            'fullname' => 'SUPER ADMINISTRATOR',
        ]);
        $superAdmin->assignRole($adminRole);
        $superAdmin->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $superAdmin->id],
            [
                'interests' => ['Administración', 'Plataformas Educativas'],
                'learning_goal' => 'Supervisión y gobernanza del sistema.',
            ]
        );

        $teacher1 = $userModelClass::firstOrCreate(
            ['email' => 'ana@incadev.com'],
            [
                'name' => 'Ana Salas',
                'password' => Hash::make('password'),
                'dni' => '00000002',
                'fullname' => 'ANA SALAS GARCIA',
            ]
        );
        $teacher1->assignRole($teacherRole);
        $teacher1->assignRole($studentRole);
        TeacherProfile::firstOrCreate(
            ['user_id' => $teacher1->id],
            [
                'subject_areas' => ['Inteligencia Artificial', 'Machine Learning'],
                'professional_summary' => 'Data Scientist Senior con 10 años de experiencia en modelos predictivos.',
            ]
        );
        StudentProfile::firstOrCreate(
            ['user_id' => $teacher1->id],
            [
                'interests' => ['IA aplicada', 'Docencia digital'],
                'learning_goal' => 'Mejorar métodos de enseñanza con IA.',
            ]
        );

        $teacher2 = $userModelClass::firstOrCreate(
            ['email' => 'dante@incadev.com'],
            [
                'name' => 'Dante Ganoza',
                'password' => Hash::make('password'),
                'dni' => '00000003',
                'fullname' => 'DANTE GANOZA UGARTE',
            ]
        );
        $teacher2->assignRole($teacherRole);
        $teacher2->assignRole($studentRole);
        TeacherProfile::firstOrCreate(
            ['user_id' => $teacher2->id],
            [
                'subject_areas' => ['Transformación Digital', 'Metodologías Ágiles', 'Gestión de Proyectos'],
                'professional_summary' => 'Agile Coach certificado, experto en optimización de procesos de negocio.',
            ]
        );
        StudentProfile::firstOrCreate(
            ['user_id' => $teacher2->id],
            [
                'interests' => ['Gestión Ágil', 'Liderazgo'],
                'learning_goal' => 'Actualizar metodologías y certificaciones ágiles.',
            ]
        );

        $teacher3 = $userModelClass::firstOrCreate(
            ['email' => 'antonio@incadev.com'],
            [
                'name' => 'Antonio Cruz',
                'password' => Hash::make('password'),
                'dni' => '00000004',
                'fullname' => 'ANTONIO CRUZ REYES',
            ]
        );
        $teacher3->assignRole($teacherRole);
        $teacher3->assignRole($studentRole);
        TeacherProfile::firstOrCreate(
            ['user_id' => $teacher3->id],
            [
                'subject_areas' => ['Cloud Computing (AWS/Azure)', 'DevOps', 'Ciberseguridad'],
                'professional_summary' => 'Arquitecto Cloud con certificaciones AWS y Azure.',
            ]
        );
        StudentProfile::firstOrCreate(
            ['user_id' => $teacher3->id],
            [
                'interests' => ['Cloud', 'Certificaciones'],
                'learning_goal' => 'Mantener certificaciones y buenas prácticas Cloud.',
            ]
        );

        $student1 = $userModelClass::firstOrCreate(
            ['email' => 'liliana@incadev.com'],
            [
                'name' => 'Liliana Guerra',
                'password' => Hash::make('password'),
                'dni' => '00000005',
                'fullname' => 'LILIANA GUERRA SALAS',
            ]
        );
        $student1->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student1->id],
            [
                'interests' => ['Inteligencia Artificial', 'Python'],
                'learning_goal' => 'Aplicar IA para análisis de datos en mi empresa.',
            ]
        );

        $student2 = $userModelClass::firstOrCreate(
            ['email' => 'pedro@incadev.com'],
            [
                'name' => 'Pedro Bravo',
                'password' => Hash::make('password'),
                'dni' => '00000006',
                'fullname' => 'PEDRO BRAVO GUTIERREZ',
            ]
        );
        $student2->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student2->id],
            [
                'interests' => ['Gestión de Proyectos', 'Scrum'],
                'learning_goal' => 'Obtener la certificación PMP y Scrum Master.',
            ]
        );

        $student3 = $userModelClass::firstOrCreate(
            ['email' => 'sofia@incadev.com'],
            [
                'name' => 'Sofia Luna',
                'password' => Hash::make('password'),
                'dni' => '00000007',
                'fullname' => 'SOFIA LUNA SANCHEZ',
            ]
        );
        $student3->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student3->id],
            [
                'interests' => ['Marketing Digital', 'Data Science'],
                'learning_goal' => 'Usar Data Science para optimizar campañas de marketing.',
            ]
        );

        $student4 = $userModelClass::firstOrCreate(
            ['email' => 'javier@incadev.com'],
            [
                'name' => 'Javier Mendoza',
                'password' => Hash::make('password'),
                'dni' => '00000008',
                'fullname' => 'JAVIER MENDOZA RUIZ',
            ]
        );
        $student4->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student4->id],
            [
                'interests' => ['Ciberseguridad', 'Redes'],
                'learning_goal' => 'Prepararme para ser analista de seguridad SOC.',
            ]
        );

        $student5 = $userModelClass::firstOrCreate(
            ['email' => 'valentina@incadev.com'],
            [
                'name' => 'Valentina Rios',
                'password' => Hash::make('password'),
                'dni' => '00000009',
                'fullname' => 'VALENTINA RIOS SILVA',
            ]
        );
        $student5->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $student5->id],
            [
                'interests' => ['Cloud Computing', 'AWS'],
                'learning_goal' => 'Conseguir la certificación AWS Solutions Architect.',
            ]
        );

        $support1 = $userModelClass::firstOrCreate(
            ['email' => 'martin@incadev.com'],
            [
                'name' => 'Martin Castillo',
                'password' => Hash::make('password'),
                'dni' => '00000010',
                'fullname' => 'MARTIN CASTILLO LEON',
            ]
        );
        $support1->assignRole($supportRole);
        $support1->assignRole($studentRole);
        SupportProfile::firstOrCreate(
            ['user_id' => $support1->id],
            [
                'skills' => ['Soporte Plataforma LMS', 'Atención al Estudiante', 'Gestión de Matrículas'],
                'experience_years' => 2,
            ]
        );
        StudentProfile::firstOrCreate(
            ['user_id' => $support1->id],
            [
                'interests' => ['Soporte Técnico', 'Atención al cliente'],
                'learning_goal' => 'Mejorar habilidades pedagógicas y de soporte.',
            ]
        );

        $support2 = $userModelClass::firstOrCreate(
            ['email' => 'lucia@incadev.com'],
            [
                'name' => 'Lucia Flores',
                'password' => Hash::make('password'),
                'dni' => '00000011',
                'fullname' => 'LUCIA FLORES MENDOZA',
            ]
        );
        $support2->assignRole($supportRole);
        $support2->assignRole($studentRole);
        SupportProfile::firstOrCreate(
            ['user_id' => $support2->id],
            [
                'skills' => ['Soporte Técnico Nivel 2', 'Plataformas de Pago', 'Gestión de Aulas Virtuales'],
                'experience_years' => 5,
            ]
        );
        StudentProfile::firstOrCreate(
            ['user_id' => $support2->id],
            [
                'interests' => ['Plataformas de Pago', 'Aulas Virtuales'],
                'learning_goal' => 'Especializarme en integración de servicios para educación.',
            ]
        );

        $auditor1 = $userModelClass::firstOrCreate(
            ['email' => 'luis@incadev.com'],
            [
                'name' => 'Luis Sandoval',
                'password' => Hash::make('password'),
                'dni' => '00000012',
                'fullname' => 'LUIS SANDOVAL VASQUEZ',
            ]
        );
        $auditor1->assignRole($auditorRole);
        $auditor1->assignRole($studentRole);
        StudentProfile::firstOrCreate(
            ['user_id' => $auditor1->id],
            [
                'interests' => ['Auditoría', 'Calidad de Procesos'],
                'learning_goal' => 'Actualizarme en normas y mejores prácticas.',
            ]
        );
    }
}
