<?php

class MedicationController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rxnormapi = new RxNormApi();
		$rxnormapi->output_type = 'json';
		$rxnorm = json_decode($rxnormapi->findRxcuiById("NDC", $id), true);
		if (isset($rxnorm['idGroup']['rxnormId'][0])) {
			$rxnorm1 = json_decode($rxnormapi->getRxConceptProperties($rxnorm['idGroup']['rxnormId'][0]), true);
			$med_rxnorm_code = $rxnorm['idGroup']['rxnormId'][0];
			$med_name = $rxnorm1['properties']['name'];
			$statusCode = 200;
			$response['resourceType'] = 'Medication';
			$response['id'] = $id;
			$response['text']['status'] = 'generated';
			$response['text']['div'] = '<div>' .  $rxnorm1['properties']['name'] . '</div>';
			$response['code']['text'] = $rxnorm1['properties']['name'];
		} else {
			$response = [
				'error' => "Medication doesn't exist."
			];
			$statusCode = 404;
		}
		return Response::json($response, $statusCode);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
