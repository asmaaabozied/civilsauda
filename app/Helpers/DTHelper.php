<?php


namespace App\Helpers;


class DTHelper
{

    public static function dtImageButton($image)
    {



            $html = <<< HTML

    <img src="{{asset('uploads/'.$image->image)}}" border="0" width="10" class="img-rounded" align="center" />

HTML;

            return $html;

    }


    public static function dtEditButton($link, $title, $permission)
    {

//        if (auth()->user()->hasPermission($permission)) {

            $html = <<< HTML
 <a href="$link" class="update" > <i class="far fa-edit me-1 fa fa-2x"></i> </a>
HTML;


            return $html;
        }

//    }

    public static function dtBlockActivateButton($link, $status, $permission)
    {

        $blockTitle = trans('site.block');
        $activateTitle = trans('site.activate');
        $statusTitle = ($status) ? $blockTitle : $activateTitle;
        $csrf =  csrf_field();
        $method_field = method_field('POST');
        $classType = ($status) ? "btn-warning" : "btn-default";
        $iconName = ($status) ? "fa-ban" : "fa-user";

            if (auth()->user()->hasPermission($permission)) {
            $html = <<< HTML
 <form action="$link" method="post" style="display: inline-block">
$csrf
$method_field
<a type="submit" class="update">

<i class="material-icons">person_outline</i>
</a>
</form>
HTML;
            return $html;
        }

    }

    public static function dtDeleteButton($link, $title, $permission)
    {


        $csrf =  csrf_field();
        $method_field = method_field('delete');
//        if (auth()->user()->hasPermission($permission)) {

            $html = <<< HTML
 <form action="$link" method="post" style="display: inline-block">
$csrf
$method_field
<button type="submit" id="delete" class="delete" style="border: none;
    background: transparent;">
<i class="far fa-trash-alt me-1 fa-2x delete"></i>
</button>
</form>
HTML;


            return $html;
        }

//    }


    public static function dtShowButton($link, $title, $permission)
    {

//        if (auth()->user()->hasPermission($permission)) {

            $html = <<< HTML
 <a href="$link" > <i class="far fa-eye me-1 fa fa-2x"></i></a>
HTML;


            return $html;
        }

//    }

}
