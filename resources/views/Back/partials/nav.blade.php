<?php
namespace App\Http\Controllers;
use App\Models\acces;
use App\Models\groupe;
use App\Models\module;
use App\Models\Icon;
use App\Models\Admin;
use App\Models\navigation;
use App\Models\Attribution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



$attrib=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->first();
$verifier_groupe=Attribution::All()->where('admins_id','=',Auth::guard('admin')->user()->id)->count();

$grp=$attrib->groupe_id;
$navigation=navigation::all()->where('etat','=',1);
$acces=acces::all()->where('groupe_id','=',$grp)
->where('etat','=',1);

//
?>

<div class="site-width">
    <!-- START: Menu-->
    <ul id="side-menu" class="sidebar-menu">

        <li class="dropdown active"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>

        </li>

        <li class="dropdown">
            @if($verifier_groupe!=0)
            @foreach($navigation as $navigations)
            <ul>
                <li class="dropdown"><a href="#"><i class="{{$navigations->icon ? $navigations->icon->nom_icon:'hjv'}}"></i>{{$navigations->navigue}}</a>
                    @foreach($acces as $access)
                    <?php
                    $mod=module::all()->where('id','=',$access->module_id)
                    ->where('navigation_id','=',$navigations->id)
                    ;
                    ?>
                        @foreach($mod as $mods)
                        <?php
                        $verifie_parent=navigation::all()->where('id','=',$mods->navigation_id)
                        ->count();
                       ?>
                    <ul class="sub-menu">
                        <li><a href="{{$mods->url}}"><i class="icon-energy"></i>{{$mods->nom_module}}</a></li>

                    </ul>
                    @endforeach
                    @endforeach
                </li>
                @endforeach
                @else
                <li class="dropdown"><a href="#"><i class="icon-options"></i>Horizontal</a></li>
                @endif
            </ul>
        </li>



    </ul>
    <!-- END: Menu-->
    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
        <li class="breadcrumb-item"><a href="#">Application</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>
