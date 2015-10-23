<?php

class MedicationStatementController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Input::all();
		if ($data) {
			$resource = 'MedicationStatement';
			$table = 'rx_list';
			$table_primary_key = 'rxl_id';
			$table_key = [
				'identifier' => 'rxl_id',
				'patient' => 'pid',
				'medication' => ['rxl_medication','rxl_ndcid']
			];
			$result = $this->resource_translation($data, $table, $table_primary_key, $table_key);
			if ($result['response'] == true) {
				$statusCode = 200;
				$response['resourceType'] = 'Bundle';
				$response['type'] = 'searchset';
				$response['id'] = 'urn:uuid:' . $this->gen_uuid();
				$response['total'] = $result['total'];
				foreach ($result['data'] as $row_id) {
					$row = DB::table($table)->where($table_primary_key, '=', $row_id)->first();
					$resource_content = $this->resource_detail($row, $resource);
					$response['entry'][] = [
						'fullUrl' => Request::url() . '/' . $row_id,
						'resource' => $resource_content
					];
				}
			} else {
				$response = [
					'error' => "Query returned 0 records.",
				];
				$statusCode = 404;
			}
		} else {
			$practice = DB::table('practiceinfo')->where('practice_id', '=', '1')->first();
			if ($practice->patient_centric == 'y') {
				// Patient Centric only
				$data1['patient'] = '1';
				$resource = 'MedicationStatement';
				$table = 'rx_list';
				$table_primary_key = 'rxl_id';
				$table_key = [
					'identifier' => 'rxl_id',
					'patient' => 'pid',
					'medication' => ['rxl_medication','rxl_ndcid']
				];
				$result = $this->resource_translation($data1, $table, $table_primary_key, $table_key);
				if ($result['response'] == true) {
					$statusCode = 200;
					$response['resourceType'] = 'Bundle';
					$response['type'] = 'searchset';
					$response['id'] = 'urn:uuid:' . $this->gen_uuid();
					$response['total'] = $result['total'];
					foreach ($result['data'] as $row_id) {
						$row = DB::table($table)->where($table_primary_key, '=', $row_id)->first();
						$resource_content = $this->resource_detail($row, $resource);
						$response['entry'][] = [
							'fullUrl' => Request::url() . '/' . $row_id,
							'resource' => $resource_content
						];
					}
				} else {
					$response = [
						'error' => "Query returned 0 records.",
					];
					$statusCode = 404;
				}
			} else {
				$response = [
					'error' => "Invalid query."
				];
				$statusCode = 404;
			}
		}
		return Response::json($response, $statusCode);
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
		$resource = 'MedicationStatement';
		$row = DB::table('rx_list')->where('rxl_id', '=', $id)->first();
		if ($row) {
			$statusCode = 200;
			$response = $this->resource_detail($row, $resource);
		} else {
			$response = [
				'error' => $resource . " doesn't exist."
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
