<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AgentContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AgentController extends BaseController
{

    protected $AgentRepository;

    /**
     * AgentManagementController constructor.
     * @param AgentRepository $AgentRepository
     */

    public function __construct(AgentContract $agentRepository)
    {
        $this->agentRepository = $agentRepository;
    }

    /**
     * List all the Agents
     */
    public function index()
    {
        $data = $this->agentRepository->listAgents();
        $this->setPageTitle('Agents', 'List of all Agents');
        return view('admin.agent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Agent', 'Create Agent');
        return view('admin.agent.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'pin_code' =>  'required',
            'phone' =>  'required|integer|digits:10',
            'password' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
            // 'video' =>  'max:50000',
        ]);
        // $this->Validate($request,[
        //     'file'=>'max:50000', //50MB
        //     'syllabus'=>'max:50000'
        // ]);
        $params = $request->except('_token');

        $data = $this->agentRepository->createAgent($params);
// dd($data);
        if (!$data) {
            return $this->responseRedirectBack('Error occurred while creating agent.', 'error', true, true);
        }
        return $this->responseRedirect('admin.agent.index', 'Agent has been added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->agentRepository->findAgentById($id);

        $this->setPageTitle('Agent', 'Edit Agent : ' . $data->title);
        return view('admin.agent.edit', compact('data'));
    }
   
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
           'first_name' =>  'required',
            'last_name' =>  'required',
            'email' =>  'required',
            'phone' =>  'required|integer|digits:10',
            'pin_code' =>  'required',
            'address' =>  'required',
            'city' =>  'required',
        ]);

        $params = $request->except('_token');

        //dd($params);

        $data = $this->agentRepository->updateAgent($params);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating agent.', 'error', true, true);
        }
        return $this->responseRedirectBack('Agent updated successfully', 'success', false, false);
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request)
    {

        $params = $request->except('_token');

        $data = $this->agentRepository->updateAgentStatus($params);

        if ($data) {
            return response()->json(array('message' => 'Agent status successfully updated'));
        }
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = $this->agentRepository->deleteAgent($id);

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while deleting agent.', 'error', true, true);
        }
        return $this->responseRedirect('admin.agent.index', 'Agent deleted successfully', 'success', false, false);
    }
}