<?php

//use App\Http\Controllers\Api\Auth\AlterarPasswordController;

use App\Http\Controllers\Api\Auth\RegisterControllerUser;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComparticipacaoController;
use App\Http\Controllers\ConfirmacaoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EmolumentoController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\GraduacaoController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\Pagamentos\mensalidadeController;
use App\Http\Controllers\Pagamentos\pagamentosController;
use App\Http\Controllers\ProvaAtrasadaController;
use App\Http\Controllers\reserva_senha_control;
use App\Http\Controllers\TCCController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\UniformeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});
// Route::post('/auth', [AuthApiController::class, 'auth']);
// Route::get('/me', [AuthApiController::class, 'me'])->middleware('auth:sanctum');
// Route::get('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/forget-password', [ResetPasswordController::class, 'sendResetLink'])->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest');
Route::post('/registerUser', [RegisterControllerUser::class, 'crear']);
Route::put('/updateuser', [RegisterControllerUser::class, 'updateUser'])->middleware('api');

Route::get('/courses', [CursoController::class, 'index'])->middleware('api');
Route::post('/filter', [CursoController::class, 'filter'])->middleware('api');
Route::post('/registerCurso', [CursoController::class, 'store'])->middleware('api');
Route::get('/getCourse/{id}', [CursoController::class, 'edit'])->middleware('api');
Route::put('/updateCurso/{id}', [CursoController::class, 'update'])->middleware('api');
Route::get('/apagarCurso/{id}', [CursoController::class, 'destroy'])->middleware('api');
Route::get('/detalhes/{id}', [CursoController::class, 'show'])->middleware('api');

Route::get('/disciplinas', [DisciplinaController::class, 'index'])->middleware('api');
Route::post('/filter', [DisciplinaController::class, 'filter'])->middleware('api');
Route::post('/registerDisciplina', [DisciplinaController::class, 'store'])->middleware('api');
Route::get('/getDisciplina/{id}', [DisciplinaController::class, 'edit'])->middleware('api');
Route::put('/updateDisciplina/{id}', [DisciplinaController::class, 'update'])->middleware('api');
Route::get('/apagarDisciplina/{id}', [DisciplinaController::class, 'destroy'])->middleware('api');
Route::get('/detalhesDisciplina/{id}', [DisciplinaController::class, 'show'])->middleware('api');
Route::get('/disciplinasEmCursos', [DisciplinaController::class, 'showDisciplinasEmCursos'])->middleware('api');
Route::get('/ExportToExcel/{id}', [ExportExcelController::class, 'export'])->middleware('api');

Route::get('/emolumentos', [EmolumentoController::class, 'index'])->middleware('api');
Route::post('/filter', [EmolumentoController::class, 'filter'])->middleware('api');
Route::post('/registerEmolumento', [EmolumentoController::class, 'store'])->middleware('api');
Route::get('/getEmolumento/{id}', [EmolumentoController::class, 'edit'])->middleware('api');
Route::put('/updateEmolumento/{id}', [EmolumentoController::class, 'update'])->middleware('api');
Route::get('/apagarEmolumento/{id}', [EmolumentoController::class, 'destroy'])->middleware('api');
Route::get('/detalhesEmolumento/{id}', [EmolumentoController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelEmolumento/{user}', [ExportExcelController::class, 'exportEmolumento'])->middleware('api');

Route::get('/uniformes', [UniformeController::class, 'index'])->middleware('api');
Route::post('/filter', [UniformeController::class, 'filter'])->middleware('api');
Route::post('/registerUniforme', [UniformeController::class, 'store'])->middleware('api');
Route::get('/getUniforme/{id}', [UniformeController::class, 'edit'])->middleware('api');
Route::put('/updateUniforme/{id}', [UniformeController::class, 'update'])->middleware('api');
Route::get('/apagarUniforme/{id}', [UniformeController::class, 'destroy'])->middleware('api');
Route::get('/detalhesUniforme/{id}', [UniformeController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelUniforme/{user}', [ExportExcelController::class, 'exportUniforme'])->middleware('api');

Route::get('/transportes', [TransporteController::class, 'index'])->middleware('api');
Route::post('/filter', [TransporteController::class, 'filter'])->middleware('api');
Route::post('/registerTransporte', [TransporteController::class, 'store'])->middleware('api');
Route::get('/getTransporte/{id}', [TransporteController::class, 'edit'])->middleware('api');
Route::put('/updateTransporte/{id}', [TransporteController::class, 'update'])->middleware('api');
Route::get('/apagarTransporte/{id}', [TransporteController::class, 'destroy'])->middleware('api');
Route::get('/detalhesTransporte/{id}', [TransporteController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelTransporte/{user}', [ExportExcelController::class, 'exportTransporte'])->middleware('api');

Route::get('/multas', [MultaController::class, 'index'])->middleware('api');
Route::post('/filter', [MultaController::class, 'filter'])->middleware('api');
Route::post('/registerMulta', [MultaController::class, 'store'])->middleware('api');
Route::get('/getMulta/{id}', [MultaController::class, 'edit'])->middleware('api');
Route::put('/updateMulta/{id}', [MultaController::class, 'update'])->middleware('api');
Route::get('/apagarMulta/{id}', [MultaController::class, 'destroy'])->middleware('api');
Route::get('/detalhesMulta/{id}', [MultaController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelMultas/{user}', [ExportExcelController::class, 'exportMultas'])->middleware('api');

Route::get('/provas_atrasadas', [ProvaAtrasadaController::class, 'index'])->middleware('api');
Route::post('/filter', [ProvaAtrasadaController::class, 'filter'])->middleware('api');
Route::post('/registerProva_atrasada', [ProvaAtrasadaController::class, 'store'])->middleware('api');
Route::get('/getProva_atrasada/{id}', [ProvaAtrasadaController::class, 'edit'])->middleware('api');
Route::put('/updateProva_atrasada/{id}', [ProvaAtrasadaController::class, 'update'])->middleware('api');
Route::get('/apagarProva_atrasada/{id}', [ProvaAtrasadaController::class, 'destroy'])->middleware('api');
Route::get('/detalhesProva_atrasada/{id}', [ProvaAtrasadaController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelProva_atrasada/{user}', [ExportExcelController::class, 'exportProva_atrasada'])->middleware('api');

Route::get('/tccs', [TCCController::class, 'index'])->middleware('api');
Route::post('/filter', [TCCController::class, 'filter'])->middleware('api');
Route::post('/registerTcc', [TCCController::class, 'store'])->middleware('api');
Route::get('/getTcc/{id}', [TCCController::class, 'edit'])->middleware('api');
Route::put('/updateTcc/{id}', [TCCController::class, 'update'])->middleware('api');
Route::get('/apagarTcc/{id}', [TCCController::class, 'destroy'])->middleware('api');
Route::get('/detalhesTcc/{id}', [TCCController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelTcc/{user}', [ExportExcelController::class, 'exportTcc'])->middleware('api');

Route::get('/confirmacoes', [ConfirmacaoController::class, 'index'])->middleware('api');
Route::post('/filter', [ConfirmacaoController::class, 'filter'])->middleware('api');
Route::post('/registerConfirmacao', [ConfirmacaoController::class, 'store'])->middleware('api');
Route::get('/getConfirmacao/{id}', [ConfirmacaoController::class, 'edit'])->middleware('api');
Route::put('/updateConfirmacao/{id}', [ConfirmacaoController::class, 'update'])->middleware('api');
Route::get('/apagarConfirmacao/{id}', [ConfirmacaoController::class, 'destroy'])->middleware('api');
Route::get('/detalhesConfirmacao/{id}', [ConfirmacaoController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelConfirmacao/{user}', [ExportExcelController::class, 'exportConfirmacao'])->middleware('api');

Route::get('/comparticipacaos', [ComparticipacaoController::class, 'index'])->middleware('api');
Route::post('/filter', [ComparticipacaoController::class, 'filter'])->middleware('api');
Route::post('/registerComparticipacao', [ComparticipacaoController::class, 'store'])->middleware('api');
Route::get('/getComparticipacao/{id}', [ComparticipacaoController::class, 'edit'])->middleware('api');
Route::put('/updateComparticipacao/{id}', [ComparticipacaoController::class, 'update'])->middleware('api');
Route::get('/apagarComparticipacao/{id}', [ComparticipacaoController::class, 'destroy'])->middleware('api');
Route::get('/detalhesComparticipacao/{id}', [ComparticipacaoController::class, 'show'])->middleware('api');
//Route::get('/ExportToExcelConfirmacao/{user}', [ExportExcelController::class, 'exportConfirmacao'])->middleware('api');

Route::get('/graduactions', [GraduacaoController::class, 'index'])->middleware('api');
Route::post('/filter', [GraduacaoController::class, 'filter'])->middleware('api');
Route::post('/registerGraduaction', [GraduacaoController::class, 'store'])->middleware('api');
Route::get('/getGraduaction/{id}', [GraduacaoController::class, 'edit'])->middleware('api');
Route::put('/updateGraduaction/{id}', [GraduacaoController::class, 'update'])->middleware('api');
Route::get('/apagarGraduaction/{id}', [GraduacaoController::class, 'destroy'])->middleware('api');
Route::get('/detalhesGraduaction/{id}', [GraduacaoController::class, 'show'])->middleware('api');

Route::get('/estudantes', [EstudanteController::class, 'index'])->middleware('api');
Route::post('/filter', [EstudanteController::class, 'filter'])->middleware('api');
Route::post('/registerEstudante', [EstudanteController::class, 'store'])->middleware('api');
Route::get('/getEstudante/{id}', [EstudanteController::class, 'edit'])->middleware('api');
Route::put('/updateEstudante/{id}', [EstudanteController::class, 'update'])->middleware('api');
Route::get('/apagarEstudante/{id}', [EstudanteController::class, 'destroy'])->middleware('api');
Route::get('/detalhesEstudante/{id}', [EstudanteController::class, 'show'])->middleware('api');
Route::get('/reserva_senha_aluno', [reserva_senha_control::class, 'show'])->middleware('api');
Route::get('/getEstudantePagamento/{id}', [EstudanteController::class, 'show'])->middleware('api');


//Pagamentos
Route::post('/pag_mensalidade', [pagamentosController::class, 'mensalidade'])->middleware('api');
Route::get('/ExportToWordComprovativo/{id}', [mensalidadeController::class, 'exportWord'])->middleware('api');

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
