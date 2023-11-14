<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\ChildrenRoutes;
use App\Models\Route;
use League\CommonMark\Extension\InlinesOnly\ChildRenderer;

class RouteController extends Controller
{
    public $children_route;
    public function __construct()
    {
        $this->children_route = new ChildrenRoutes();
    }
    public function index(request $request){
        if ($request->ajax()) {
            $data = $this->children_route->getRoutes();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="'.url("routes/create?id=$row->id").'" class="edit btn btn-primary btn-sm">
                                <i class="fa-solid fa-solid fa fa-edit"></i>
                            </a>
                            <a onclick="getDelete('. $row->id .')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-solid fa fa-trash"></i>
                            </a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin/pages/routes/index');
    }

    public function create(request $request){
        $children_routes = [];
        $route = [];
        $selected = [
            'id' => null,
            'label' => null,
            'icon' => null,
            'route' => null,
            'is_parents' => null,
        ];

        if($request->isMethod('post')){
            $route = [
                "label" => $request->label,
                "icon" => $request->icon,
                "route" => isset($request->route) ? $request->route : '#',
                "is_active" => 1,
                "is_parent" => isset($request->is_parents   ) ? 1 : 0,
            ];
            if($request->input('id') > 0){
                $message = "Updated";
                Route::find($request->input('id'))->update($route);
            }else{
                $message = "Created";
                Route::create($route);
            }
            $routes = Route::latest()->first();
            if(isset($request->data)){
                foreach($request->data as $key => $value){
                    $data = [
                        "parents_id" => !isset($value['child_id']) ? $routes->id : $request->input('id'),
                        "label" => $value['label'],
                        "route" => $value['route'],
                        "is_active" => 1,
                    ];
                    if(isset($value['child_id'])){
                        ChildrenRoutes::find($value['child_id'])->update($data);
                    }else{
                        ChildrenRoutes::create($data);
                    }
                }
            }
            
            return response()->json(['status' => 200, 'message' => 'Route '.$message.' successfuly']);
        }

        // This section is for edit page
        if($request->input('id')){
            $children_routes = ChildrenRoutes::where('parents_id', $request->input('id'))->get();
            $route =  Route::find($request->input('id'));
            $selected['id'] = $route->id;
            $selected['label'] = $route->label;
            $selected['icon'] = $route->icon;
            $selected['route'] = $route->route;
            $selected['is_parents'] = $route->is_parent;
        }
        return view("admin/pages/routes/create", compact('selected', 'children_routes'));
    }

    public function edit($id, Request $request){
        if($request->isMethod('post')){
            $route = [
                "label" => $request->label,
                "icon" => $request->icon,
                "route" => isset($request->route) ? $request->route : '#',
                "is_active" => 1,
                "is_parent" => isset($request->is_parents   ) ? 1 : 0,
            ];
            Route::create($route);
            $routes = Route::latest()->first();
            foreach($request->data as $key => $value){
                $data = [
                    "parents_id" => $routes->id,
                    "label" => $value['label'],
                    "route" => $value['route'],
                    "is_active" => 1,
                ];
                ChildrenRoutes::create($data);
            }
            return response()->json(['status' => 200, 'message' => 'Route created successfuly']);
        }
        $children_route = ChildrenRoutes::find($id);
        $route =  Route::find($children_route->parents_id);
        $children_routes = ChildrenRoutes::where('parents_id', $children_route->parents_id)->get();
        return view("admin/pages/routes/create", compact('route', 'children_routes'));
    }

    //delete
    public function delete($id){
        Route::find($id)->delete();
        ChildrenRoutes::where('parents_id', $id)->delete();
        return response()->json(['status' => 200, 'message' => 'Route Deleted
         successfuly']);
    }

}
