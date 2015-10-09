<?php

class ConditionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Input::all();
		if ($data) {
			$resource = 'Condition';
			$table = 'issues';
			$table_primary_key = 'issue_id';
			$table_key = [
				'identifier' => 'issue_id',
				'patient' => 'pid',
				'encounter' => 'encounter',
				'dateAsserted' => 'issue_date_active',
				'code' => 'issue'
			];
			$result = $this->resource_translation($data, $table, $table_primary_key, $table_key);
			$table1 = 'assessment';
			$table1_primary_key = 'eid';
			$table1_key = [
				'identifier' => 'eid',
				'patient' => 'pid',
				'encounter' => 'encounter',
				'dateAsserted' => 'assessment_date',
				'code' => ['assessment_1','assessment_2','assessment_3','assessment_4','assessment_5','assessment_6','assessment_7','assessment_8','assessment_9','assessment_10','assessment_11','assessment_12']
			];
			$result1 = $this->resource_translation($data, $table1, $table1_primary_key, $table1_key);
			$count = 0;
			if ($result['response'] == true) {
				$count += $result['total'];
			}
			if ($result1['response'] == true) {
				$count += $result1['total'];
			}
			if ($count > 0) {
				$statusCode = 200;
				$response['resourceType'] = 'Bundle';
				$response['type'] = 'searchset';
				$response['id'] = 'urn:uuid:' . $this->gen_uuid();
				$response['total'] = $count;
				foreach ($result['data'] as $row_id) {
					$row = DB::table($table)->where($table_primary_key, '=', $row_id)->first();
					$resource_content = $this->resource_detail($row, $resource);
					$response['entry'][] = [
						'fullUrl' => Request::url() . '/issue_id_' . $row_id,
						'resource' => $resource_content
					];
				}
				foreach ($result1['data'] as $row_id1) {
					$row1 = DB::table($table1)->where($table1_primary_key, '=', $row_id1)->first();
					$resource_content1 = $this->resource_detail($row1, $resource);
					$response['entry'][] = [
						'fullUrl' => Request::url() . '/eid_' . $row_id,
						'resource' => $resource_content1
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
		$response['test'] = $count;
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
		$resource = 'Condition';
		if (strpos($id, 'issue_id_') >= 0 && strpos($id, 'issue_id_') !== false) {
			$table = "issues";
			$table_primary_key = 'issue_id';
			$value = str_replace('issue_id_', '', $id);
		} 
		if (strpos($id, 'eid_') >= 0 && strpos($id, 'eid_') !== false) {
			$table = "assessment";
			$table_primary_key = 'eid';
			$value = str_replace('eid_', '', $id);
		}
		$row = DB::table($table)->where($table_primary_key, '=', $value)->first();
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
