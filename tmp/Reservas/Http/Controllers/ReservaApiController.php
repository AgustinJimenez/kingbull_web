<?php namespace Modules\Reservas\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Reservas\Entities\Reserva;
use Modules\User\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use DatePeriod, DateInterval, DateTime;

use Response;

class ReservaApiController extends AdminBaseController
{
    /**
     * @var UserRepository
     */
    private $user;


    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function utf8_encode_deep(&$input)
    {
        if (is_string($input))
        {
            $input = utf8_encode($input);
        } else if (is_array($input))
        {
            foreach ($input as &$value)
            {
                self::utf8_encode_deep($value);
            }

        unset($value);
        } else if (is_object($input)) {
        $vars = array_keys(get_object_vars($input));

        foreach ($vars as $var) {
            self::utf8_encode_deep($input->$var);
        }
        }
    }

    public function allReserva($user_id)
    {
        setlocale(LC_ALL, 'es_ES');
        $monday = date( 'd-m-Y', strtotime( 'monday this week' ) );
        $saturday = date( 'd-m-Y', strtotime( 'sunday this week' ) );
        $hoy = date( 'd-m-Y', strtotime( 'today' ) );

        $primerDia = DateTime::createFromFormat('d-m-Y', $monday);
        $ultimoDia = DateTime::createFromFormat('d-m-Y', $saturday);
        $today = DateTime::createFromFormat('d-m-Y', $hoy);

        $daterange = new DatePeriod($primerDia, new DateInterval('P1D'), $ultimoDia);
        $dias = array();
        foreach ($daterange as $date) {
            $reservado = false;
            if (Reserva::where('user_id', $user_id)
                ->where('fecha', $date->format("d-m-Y"))
                ->exists()) {
                $reservado = Reserva::where('user_id', $user_id)->where('fecha', $date->format("d-m-Y"))->get(['reservar']);

                if($reservado[0]['reservar'] == 1){
                    $reservado = true;
                }else{
                    $reservado = false;
                }
            }
            if($today <= $date){
                $dias[] = array(
                    'dia' => strftime("%A", $date->getTimestamp()).' '.$date->format("d"),
                    'fecha' => $date->format("d-m-Y"),
                    'reservado' => $reservado
                );
            }

        }

        $this->utf8_encode_deep($dias);

        return response()->json($dias);
    }

    function createDateRangeArray($strDateFrom,$strDateTo)
    {
        $interval = new DateInterval('P1D');
        //$interval = \DateInterval::createFromDateString('P1D');
        $daterange = new DatePeriod($strDateFrom, $interval ,$strDateTo);



        return $daterange;
    }

    public function createReserva(Request $request)
    {
        $params = $request->input('datos');
        $user_id = $request->input('user_id');
        foreach ($params as $value){
            if(Reserva::where('user_id',$user_id)
                ->where('fecha', $value['fecha'])
                ->exists()){
                Reserva::where('user_id',$user_id)->where('fecha', $value['fecha'])->update([
                   'fecha' =>$value['fecha'],
                   'reservar' =>$value['reservado']
                ]);
            }else{
                Reserva::create([
                    'fecha' =>$value['fecha'],
                    'reservar' =>$value['reservado'],
                    'user_id' => $user_id
                ]);
            }
        }

        return response()->json(['status' => 'OK']);
    }

}