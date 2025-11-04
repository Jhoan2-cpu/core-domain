<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;
use IncadevUns\CoreDomain\Enums\CourseVersionStatus;
use IncadevUns\CoreDomain\Models\AcademicSetting;
use IncadevUns\CoreDomain\Models\Course;
use IncadevUns\CoreDomain\Models\CourseVersion;
use IncadevUns\CoreDomain\Models\Module;

class AdministrativeSeeder extends Seeder
{
    public function run(): void
    {
        AcademicSetting::create([
            'base_grade' => 20,
            'min_passing_grade' => 11,
            'absence_percentage' => 30.00,
        ]);

        // --- CURSO 1: Inteligencia Artificial y Data Science ---

        // 1. Crear el Curso
        $course1 = Course::create([
            'name' => 'Inteligencia Artificial y Data Science',
            'description' => 'Curso enfocado en especializaciones emergentes y transformación digital.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version1 = CourseVersion::create([
            'course_id' => $course1->id,
            'version' => '2025-01',
            'name' => 'IA-DS-2025-01',
            'price' => 350.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'Fundamentos de IA',
            'description' => 'Conceptos clave y aplicaciones de la IA.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'IA Generativa y Contenidos',
            'description' => 'Uso de IA para creación de contenidos y marketing.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'Analítica de Datos con IA',
            'description' => 'Análisis de datos para la toma de decisiones.',
            'sort' => 3,
        ]);

        // --- CURSO 2: Gestión de Proyectos de Transformación Digital ---

        // 1. Crear el Curso
        $course2 = Course::create([
            'name' => 'Gestión de Proyectos de Transformación Digital',
            'description' => 'Aprende a liderar la innovación y gestión institucional en la era digital.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version2 = CourseVersion::create([
            'course_id' => $course2->id,
            'version' => '2025-01',
            'name' => 'GP-TD-2025-01',
            'price' => 300.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Planificación y Estrategia',
            'description' => 'Definición de objetivos y planificación institucional.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Metodologías Ágiles',
            'description' => 'Gestión de innovación y mejora continua.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Liderazgo y Comunicación Digital',
            'description' => 'Gestión de equipos y colaboración digital.',
            'sort' => 3,
        ]);

        // --- CURSO 3: Desarrollo Web y Cloud Computing ---

        // 1. Crear el Curso
        $course3 = Course::create([
            'name' => 'Desarrollo Web y Cloud Computing',
            'description' => 'Aprende a construir y desplegar aplicaciones modernas en la nube.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version3 = CourseVersion::create([
            'course_id' => $course3->id,
            'version' => '2025-01',
            'name' => 'DW-CC-2025-01',
            'price' => 320.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Fundamentos del Desarrollo Web',
            'description' => 'HTML, CSS, JavaScript y frameworks modernos.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Introducción a Cloud Computing (AWS)',
            'description' => 'Servicios clave de AWS: EC2, S3, RDS.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Despliegue y DevOps Básico',
            'description' => 'Contenedores (Docker) y despliegue continuo.',
            'sort' => 3,
        ]);
    }
}
