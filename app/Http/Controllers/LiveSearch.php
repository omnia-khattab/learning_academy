<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class LiveSearch extends Controller
{
    //
    function index()
        {
        return view('live_search');
        }

        function action(Request $request)
        {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Course::where('name', 'like', '%'.$query.'%')->get();
            
        }
        else
        {
        $data = Course::orderBy('id', 'desc')
            ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
        foreach($data as $row)
        {
            $output .= '
            <tr>
            <td>'.$row->name.'</td>
            <td>'.$row->desc.'</td>
            <td>'.$row->content.'</td>
            <td>'.'$'.$row->price.'</td>
            </tr>
            ';
        }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

}
