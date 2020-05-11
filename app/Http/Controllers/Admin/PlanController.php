<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{


    private $repository;



    public function __construct(Plan $plan)

    {

    $this->repository = $plan;

    }

    public function index()
    {
       // $plans = $this->repository->all();
          $plans = $this->repository->latest()->paginate(10);

        return view('admin.pages.plans.index',[
            'plans' => $plans,
        ]);
    }

    public function create()
    {
       // $plans = $this->repository->all();
        //  $plans = $this->repository->latest()->paginate(1);

        return view('admin.pages.plans.create');
    }

    public function show($url)
    {
       // $plans = $this->repository->all();
        $plan = $this->repository->where('url',$url)->first();
         
        if(!$plan)

        return redirect()->back();

        return view('admin.pages.plans.show',[
            'plan' => $plan
        ]);
    }

    public function search(Request $request)
    {
       // $plans = $this->repository->all();
        //dd($request->all);
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        
        return view('admin.pages.plans.index',[
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function destroy($url)
    {
       // $plans = $this->repository->all();
        $plan = $this->repository->where('url',$url)->first();
         
        if(!$plan)
        return redirect()->back();

        $plan->delete();
        
        $plans = $this->repository->latest()->paginate(10);
        return view('admin.pages.plans.index',[
            'plans' => $plans
        ]);
    }

    public function edit($url)
    {
       // $plans = $this->repository->all();
        $plan = $this->repository->where('url',$url)->first();
         
        if(!$plan)
        return redirect()->back();
        
        return view('admin.pages.plans.edit',[
            'plan' => $plan
        ]);
    }

    public function update(Request $request,$url)
    {
       // $plans = $this->repository->all();
        $plan = $this->repository->where('url',$url)->first();
         
        if(!$plan)
        return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    public function store(StoreUpdatePlan $request)
    {
       // $plans = $this->repository->all();

        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }
}
