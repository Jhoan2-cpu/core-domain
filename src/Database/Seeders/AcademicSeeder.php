<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use IncadevUns\CoreDomain\Enums\AttendanceStatus;
use IncadevUns\CoreDomain\Enums\EnrollmentAcademicStatus;
use IncadevUns\CoreDomain\Enums\GroupStatus;
use IncadevUns\CoreDomain\Enums\MediaType;
use IncadevUns\CoreDomain\Enums\PaymentStatus;
use IncadevUns\CoreDomain\Enums\PaymentVerificationStatus;
use IncadevUns\CoreDomain\Models\Attendance;
use IncadevUns\CoreDomain\Models\ClassSession;
use IncadevUns\CoreDomain\Models\ClassSessionMaterial;
use IncadevUns\CoreDomain\Models\CourseVersion;
use IncadevUns\CoreDomain\Models\Enrollment;
use IncadevUns\CoreDomain\Models\EnrollmentPayment;
use IncadevUns\CoreDomain\Models\Exam;
use IncadevUns\CoreDomain\Models\Grade;
use IncadevUns\CoreDomain\Models\Group;

class AcademicSeeder extends Seeder
{
    public function run(): void
    {
        // Usamos una transacción para asegurar que todo se cree correctamente
        DB::transaction(function () {

            // --- 0. OBTENER DEPENDENCIAS (Usuarios, Cursos, Módulos) ---

            $userModelClass = config('auth.providers.users.model', 'App\Models\User');

            // Profesores
            $userAna = $userModelClass::where('dni', '00000002')->first();
            $userDante = $userModelClass::where('dni', '00000003')->first();
            $userAntonio = $userModelClass::where('dni', '00000004')->first();

            // Estudiantes
            $userLiliana = $userModelClass::where('dni', '00000005')->first();
            $userPedro = $userModelClass::where('dni', '00000006')->first();
            $userSofia = $userModelClass::where('dni', '00000007')->first();
            $userJavier = $userModelClass::where('dni', '00000008')->first();
            $userValentina = $userModelClass::where('dni', '00000009')->first();

            // Versiones de Curso
            $versionIA = CourseVersion::where('name', 'IA-DS-2025-01')->first();
            $versionGPTD = CourseVersion::where('name', 'GP-TD-2025-01')->first();
            $versionDWCC = CourseVersion::where('name', 'DW-CC-2025-01')->first();

            // Módulos (Solo para G1)
            /** @var \IncadevUns\CoreDomain\Models\Module $moduleIA1 */
            $moduleIA1 = $versionIA->modules()->where('sort', 1)->first();
            /** @var \IncadevUns\CoreDomain\Models\Module $moduleIA2 */
            $moduleIA2 = $versionIA->modules()->where('sort', 2)->first();
            /** @var \IncadevUns\CoreDomain\Models\Module $moduleIA3 */
            $moduleIA3 = $versionIA->modules()->where('sort', 3)->first();

            // --- 1. GRUPO 1: IA-DS-2025-01 (Activo y con notas) ---

            $group1 = Group::create([
                'course_version_id' => $versionIA->id,
                'name' => 'IA-DS G1-2025 (Activo)',
                'start_date' => Carbon::parse('2025-10-01'),
                'end_date' => Carbon::parse('2025-12-15'),
                'status' => GroupStatus::Active,
            ]);

            // 1.1 Profesor
            $group1->teachers()->attach($userAna->id);

            // 1.2 Alumnos (Matrículas y Pagos Validados)
            $enrollmentsG1 = [];
            $studentsG1 = [
                $userLiliana,
                $userPedro,
                $userSofia,
                $userJavier,
            ];

            foreach ($studentsG1 as $student) {
                $enrollment = Enrollment::create([
                    'group_id' => $group1->id,
                    'user_id' => $student->id,
                    'payment_status' => PaymentStatus::Paid,
                    'academic_status' => EnrollmentAcademicStatus::Active,
                ]);

                EnrollmentPayment::create([
                    'enrollment_id' => $enrollment->id,
                    'operation_number' => 'OP-123'.$student->dni,
                    'agency_number' => 'AG-001',
                    'operation_date' => Carbon::parse('2025-09-20'),
                    'amount' => $versionIA->price,
                    'evidence_path' => 'pagos/comprobante_'.$student->dni.'.jpg',
                    'status' => PaymentVerificationStatus::Approved,
                ]);

                // Guardamos la matrícula para usarla luego en notas y asistencias
                $enrollmentsG1[$student->dni] = $enrollment;
            }

            // 1.3 Clases (Total 4)
            // Modulo 1 (1 clase)
            $class1_M1 = ClassSession::create([
                'group_id' => $group1->id, 'module_id' => $moduleIA1->id,
                'title' => 'Introducción a la IA',
                'start_time' => Carbon::parse('2025-10-05 18:00'),
                'end_time' => Carbon::parse('2025-10-05 20:00'),
                'meet_url' => 'https://meet.google.com/test-001',
            ]);
            ClassSessionMaterial::create(['class_session_id' => $class1_M1->id, 'type' => MediaType::Document, 'material_url' => 'material/clase1-intro.pdf']);
            ClassSessionMaterial::create(['class_session_id' => $class1_M1->id, 'type' => MediaType::Video, 'material_url' => 'https://youtube.com/watch?v=video1']);

            // Modulo 2 (2 clases)
            $class2_M2 = ClassSession::create([
                'group_id' => $group1->id, 'module_id' => $moduleIA2->id,
                'title' => 'Modelos Generativos (Texto)',
                'start_time' => Carbon::parse('2025-10-12 18:00'),
                'end_time' => Carbon::parse('2025-10-12 20:00'),
                'meet_url' => 'https://meet.google.com/test-002',
            ]);
            ClassSessionMaterial::create(['class_session_id' => $class2_M2->id, 'type' => MediaType::Link, 'material_url' => 'https://openai.com/']);

            $class3_M2 = ClassSession::create([
                'group_id' => $group1->id, 'module_id' => $moduleIA2->id,
                'title' => 'Modelos Generativos (Imágenes)',
                'start_time' => Carbon::parse('2025-10-19 18:00'),
                'end_time' => Carbon::parse('2025-10-19 20:00'),
                'meet_url' => 'https://meet.google.com/test-003',
            ]);
            ClassSessionMaterial::create(['class_session_id' => $class3_M2->id, 'type' => MediaType::Document, 'material_url' => 'material/clase3-imagenes.pdf']);

            // Modulo 3 (1 clase)
            $class4_M3 = ClassSession::create([
                'group_id' => $group1->id, 'module_id' => $moduleIA3->id,
                'title' => 'Dashboards con PowerBI y IA',
                'start_time' => Carbon::parse('2025-10-26 18:00'),
                'end_time' => Carbon::parse('2025-10-26 20:00'),
                'meet_url' => 'https://meet.google.com/test-004',
            ]);
            ClassSessionMaterial::create(['class_session_id' => $class4_M3->id, 'type' => MediaType::Video, 'material_url' => 'https://youtube.com/watch?v=video4']);

            $allClassesG1 = [$class1_M1, $class2_M2, $class3_M2, $class4_M3];

            // 1.4 Exámenes (Total 4)
            // Modulo 1 (2 exámenes)
            $exam1_M1 = Exam::create(['group_id' => $group1->id, 'module_id' => $moduleIA1->id, 'title' => 'Examen Parcial 1', 'start_time' => Carbon::parse('2025-10-10 00:00'), 'end_time' => Carbon::parse('2025-10-11 23:59'), 'exam_url' => 'https://forms.google.com/examen-001']);
            $exam2_M1 = Exam::create(['group_id' => $group1->id, 'module_id' => $moduleIA1->id, 'title' => 'Control de Lectura 1', 'start_time' => Carbon::parse('2025-10-11 00:00'), 'end_time' => Carbon::parse('2025-10-11 23:59'), 'exam_url' => 'https://forms.google.com/examen-002']);
            // Modulo 2 (1 examen)
            $exam3_M2 = Exam::create(['group_id' => $group1->id, 'module_id' => $moduleIA2->id, 'title' => 'Examen Parcial 2', 'start_time' => Carbon::parse('2025-10-24 00:00'), 'end_time' => Carbon::parse('2025-10-25 23:59'), 'exam_url' => 'https://forms.google.com/examen-003']);
            // Modulo 3 (1 examen)
            $exam4_M3 = Exam::create(['group_id' => $group1->id, 'module_id' => $moduleIA3->id, 'title' => 'Examen Final', 'start_time' => Carbon::parse('2025-11-01 00:00'), 'end_time' => Carbon::parse('2025-11-02 23:59'), 'exam_url' => 'https://forms.google.com/examen-004']);

            $allExamsG1 = [$exam1_M1, $exam2_M1, $exam3_M2, $exam4_M3];

            // 1.5 Asistencias y Notas (Según requisitos)

            // Liliana (DNI 00000005): Todo Presente, Todo Aprobado
            foreach ($allClassesG1 as $class) {
                Attendance::create(['class_session_id' => $class->id, 'enrollment_id' => $enrollmentsG1['00000005']->id, 'status' => AttendanceStatus::Present]);
            }
            Grade::create(['exam_id' => $exam1_M1->id, 'enrollment_id' => $enrollmentsG1['00000005']->id, 'grade' => 15.00, 'feedback' => 'Buen trabajo.']);
            Grade::create(['exam_id' => $exam2_M1->id, 'enrollment_id' => $enrollmentsG1['00000005']->id, 'grade' => 14.00, 'feedback' => 'Correcto.']);
            Grade::create(['exam_id' => $exam3_M2->id, 'enrollment_id' => $enrollmentsG1['00000005']->id, 'grade' => 16.00, 'feedback' => 'Excelente.']);
            Grade::create(['exam_id' => $exam4_M3->id, 'enrollment_id' => $enrollmentsG1['00000005']->id, 'grade' => 15.50, 'feedback' => 'Muy bien.']);

            // Pedro (DNI 00000006): Todo Presente, Todo Aprobado
            foreach ($allClassesG1 as $class) {
                Attendance::create(['class_session_id' => $class->id, 'enrollment_id' => $enrollmentsG1['00000006']->id, 'status' => AttendanceStatus::Present]);
            }
            Grade::create(['exam_id' => $exam1_M1->id, 'enrollment_id' => $enrollmentsG1['00000006']->id, 'grade' => 13.00, 'feedback' => 'Aprobado.']);
            Grade::create(['exam_id' => $exam2_M1->id, 'enrollment_id' => $enrollmentsG1['00000006']->id, 'grade' => 17.00, 'feedback' => 'Muy bien.']);
            Grade::create(['exam_id' => $exam3_M2->id, 'enrollment_id' => $enrollmentsG1['00000006']->id, 'grade' => 12.00, 'feedback' => 'Ajustado, pero aprobado.']);
            Grade::create(['exam_id' => $exam4_M3->id, 'enrollment_id' => $enrollmentsG1['00000006']->id, 'grade' => 14.00, 'feedback' => 'Buen resultado.']);

            // Sofia (DNI 00000007): Todo Presente, Todo Desaprobado
            foreach ($allClassesG1 as $class) {
                Attendance::create(['class_session_id' => $class->id, 'enrollment_id' => $enrollmentsG1['00000007']->id, 'status' => AttendanceStatus::Present]);
            }
            Grade::create(['exam_id' => $exam1_M1->id, 'enrollment_id' => $enrollmentsG1['00000007']->id, 'grade' => 10.50, 'feedback' => 'Faltó poco.']);
            Grade::create(['exam_id' => $exam2_M1->id, 'enrollment_id' => $enrollmentsG1['00000007']->id, 'grade' => 8.00, 'feedback' => 'Revisar material.']);
            Grade::create(['exam_id' => $exam3_M2->id, 'enrollment_id' => $enrollmentsG1['00000007']->id, 'grade' => 5.00, 'feedback' => 'Nota muy baja.']);
            Grade::create(['exam_id' => $exam4_M3->id, 'enrollment_id' => $enrollmentsG1['00000007']->id, 'grade' => 9.50, 'feedback' => 'Insuficiente.']);

            // Javier (DNI 00000008): Notas Altas, 2 Faltas
            Attendance::create(['class_session_id' => $class1_M1->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'status' => AttendanceStatus::Present]);
            Attendance::create(['class_session_id' => $class2_M2->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'status' => AttendanceStatus::Absent]); // Falta 1
            Attendance::create(['class_session_id' => $class3_M2->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'status' => AttendanceStatus::Present]);
            Attendance::create(['class_session_id' => $class4_M3->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'status' => AttendanceStatus::Absent]); // Falta 2
            Grade::create(['exam_id' => $exam1_M1->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'grade' => 18.00, 'feedback' => 'Excelente.']);
            Grade::create(['exam_id' => $exam2_M1->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'grade' => 20.00, 'feedback' => 'Perfecto.']);
            Grade::create(['exam_id' => $exam3_M2->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'grade' => 17.00, 'feedback' => 'Muy bien.']);
            Grade::create(['exam_id' => $exam4_M3->id, 'enrollment_id' => $enrollmentsG1['00000008']->id, 'grade' => 19.00, 'feedback' => 'Excelente.']);

            // --- 2. GRUPO 2: GP-TD-2025-01 (Activo, sin contenido) ---

            $group2 = Group::create([
                'course_version_id' => $versionGPTD->id,
                'name' => 'GP-TD G1-2025 (Activo)',
                'start_date' => Carbon::parse('2025-11-01'),
                'end_date' => Carbon::parse('2026-01-15'),
                'status' => GroupStatus::Active,
            ]);

            // 2.1 Profesores
            $group2->teachers()->attach([$userDante->id, $userAna->id]);

            // 2.2 Alumnos (Matrículas y Pagos Validados)
            $studentsG2 = [
                $userPedro,
                $userSofia,
                $userJavier,
                $userValentina,
            ];

            foreach ($studentsG2 as $student) {
                $enrollment = Enrollment::create([
                    'group_id' => $group2->id,
                    'user_id' => $student->id,
                    'payment_status' => PaymentStatus::Paid,
                    'academic_status' => EnrollmentAcademicStatus::Active,
                ]);

                EnrollmentPayment::create([
                    'enrollment_id' => $enrollment->id,
                    'operation_number' => 'OP-456'.$student->dni,
                    'agency_number' => 'AG-002',
                    'operation_date' => Carbon::parse('2025-10-15'),
                    'amount' => $versionGPTD->price,
                    'evidence_path' => 'pagos/comprobante_'.$student->dni.'.jpg',
                    'status' => PaymentVerificationStatus::Approved,
                ]);
            }

            // --- 3. GRUPO 3: GP-TD-2025-01 (Enrolling, 1 alumno pendiente) ---

            $group3 = Group::create([
                'course_version_id' => $versionGPTD->id,
                'name' => 'GP-TD G2-2025 (Matrícula Abierta)',
                'start_date' => Carbon::parse('2025-11-15'),
                'end_date' => Carbon::parse('2026-02-01'),
                'status' => GroupStatus::Enrolling,
            ]);

            // 3.1 Profesores
            $group3->teachers()->attach([$userDante->id, $userAntonio->id]);

            // 3.2 Alumno Pendiente (Pedro)
            $enrollmentPedroG3 = Enrollment::create([
                'group_id' => $group3->id,
                'user_id' => $userPedro->id,
                'payment_status' => PaymentStatus::Pending,
                'academic_status' => EnrollmentAcademicStatus::Pending,
            ]);

            // 3.3 Pago Pendiente
            EnrollmentPayment::create([
                'enrollment_id' => $enrollmentPedroG3->id,
                'operation_number' => 'OP-789'.$userPedro->dni,
                'agency_number' => 'AG-003',
                'operation_date' => Carbon::parse('2025-11-02'),
                'amount' => $versionGPTD->price,
                'evidence_path' => 'pagos/pendiente_'.$userPedro->dni.'.jpg',
                'status' => PaymentVerificationStatus::Pending,
            ]);

            // --- 4. GRUPO 4: DW-CC-2025-01 (Enrolling, sin alumnos) ---

            $group4 = Group::create([
                'course_version_id' => $versionDWCC->id,
                'name' => 'DW-CC G1-2025 (Matrícula Abierta)',
                'start_date' => Carbon::parse('2025-12-01'),
                'end_date' => Carbon::parse('2026-03-01'),
                'status' => GroupStatus::Enrolling,
            ]);

            // 4.1 Profesor
            $group4->teachers()->attach($userAna->id);

            // 4.2 Sin Alumnos (aún)

        }); // Fin de la transacción DB
    }
}
