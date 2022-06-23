<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AgentSalaryContract;
use App\Http\Controllers\BaseController;
use App\Model\Agent;
use Illuminate\Http\Request;

class AgentSalaryController extends BaseController
{

    protected $agentSalaryRepository;

    /**
     * Agent SalaryManagementController constructor.
     * @param AgentSalaryRepository $AgentSalaryRepository
     */

    public function __construct(AgentSalaryContract $agentSalaryRepository)
    {
        $this->agentSalaryRepository = $agentSalaryRepository;
    }

    /**
     * List all the agent salaries
     */
    public function index()
    {
        $data = $this->agentSalaryRepository->listAgentSalaries();
        $this->setPageTitle('Agent Salaries', 'List of all data');
        return view('admin.agent_salary.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::get();
        $this->setPageTitle('Agent Salary', 'Create Agent Salary');
        return view('admin.agent_salary.add',compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'first_name' =>  'required',
        //     'last_name' =>  'required',
        //     'email' =>  'required',
        //     'pin_code' =>  'required',
        //     'phone' =>  'required|integer|digits:10',
        //     'password' =>  'required',
        //     'address' =>  'required',
        //     'city' =>  'required',
        //     'pin' =>  'required',
        //     // 'video' =>  'max:50000',
        // ]);
        // $this->Validate($request,[
        //     'file'=>'max:50000', //50MB
        //     'syllabus'=>'max:50000'
        // ]);
        $params = $request->except('_token');

        $data = $this->agentSalaryRepository->createAgentSalary($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while creating data.', 'error', true, true);
        }
        return $this->responseRedirect('admin.agent.salary.index', 'Agent Salary has been added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $agents = Agent::get();
        $data = $this->agentSalaryRepository->findAgentSalaryById($id);

        $this->setPageTitle('Agent Salary', 'Edit Agent Salary : ' . $data->title);
        return view('admin.agent_salary.edit', compact('data','agents'));
    }
   
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //    'first_name' =>  'required',
        //     'last_name' =>  'required',
        //     'email' =>  'required',
        //     'phone' =>  'required|integer|digits:10',
        //     'pin_code' =>  'required',
        //     'address' =>  'required',
        //     'city' =>  'required',
        //     'pin' =>  'required',
        // ]);

        $params = $request->except('_token');

        //dd($params);

        $data = $this->agentSalaryRepository->updateAgentSalary($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating agent salary.', 'error', true, true);
        }
        return $this->responseRedirectBack('Agent Salary updated successfully', 'success', false, false);
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request)
    {

        $params = $request->except('_token');

        $data = $this->agentSalaryRepository->updateAgentSalaryStatus($params);

        if ($data) {
            return response()->json(array('message' => 'Agent Salary status successfully updated'));
        }
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->agentSalaryRepository->deleteAgentSalary($id);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while deleting agent salary.', 'error', true, true);
        }
        return $this->responseRedirect('admin.agent.salary.index', 'agent salary deleted successfully', 'success', false, false);
    }
}