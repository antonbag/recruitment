<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Recruitment
* @copyright	
* @author		Albert Moreno -  - 
* @license		
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
* Create the SEF url.
*
* @param	array	&$query	List of the vars of the query.
*
* @return	array	Segments for the SEF route.
*/
function RecruitmentCkBuildRoute(&$query)
{
	$view = null;
	$segments = array();
	if(isset($query['view']))
	{
		$view = $query['view'];

		// First segment always the view name
		$segments[] = $view;

		unset( $query['view'] );

		$configRoute = RecruitmentRouteConfig();

		if (isset($configRoute[$view]))
		foreach($configRoute[$view] as $config)
		{
			$type = (isset($config['type'])?$config['type']:'var');
			$value = null;
			switch($type)
			{
				case 'layout':
					if (isset($query['layout']))
					{
						$value = $query['layout'];
						unset($query['layout']);
					}
					break;

				case 'slug':

					$id = null;
					if (isset($query['id']))
					{
						$id = $query['id'];
						unset($query['id']);
					}
					else if (isset($query['cid']))
					{
						$id = $query['cid'];
						unset($query['cid']);
					}

					if (is_array($id))
					{
						if (count($id))
							$id = $id[0];
						else
							$id = null;
					}

					if($id)
					{
						$value = $id;

						// Complete the ID with the slug (alias)
						if ((strpos($value, ':') === false) && (isset($config['aliasKey'])))
							$value = RecruitmentBuildSlug($value, $view, $config['aliasKey']);

					}


					break;

				case 'var':
					if (!isset($config['name']))
						break;

					$varName = $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];

					if (is_array($value))
						$value = implode(',', $value);

					unset($query[$varName]);

					break;

				case 'filter':
					if (!isset($config['name']))
						break;

					$varName = 'filter_' . $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];
					unset($query[$varName]);


					if (is_array($value))
						$values = $value;
					else
						$values = explode(',', $value);

					$newValues = array();
					foreach($values as $value)
					{
						$newValue = $value;
						// Complete the ID with the slug (alias)
						if (strpos($value, ':') === false)
						{
							if (isset($config['aliasKey']) && isset($config['model']))
								$newValue = RecruitmentBuildSlug($value, $config['model'], $config['aliasKey']);
						}

						$newValues[] = $newValue;
					}

					$value = implode(',', $newValues);

					break;
			}

			$segments[] = $value;
		}
	}

	return $segments;

}

/**
* Create the query request from the route.
*
* @param	array	$segments	Segments of the SEF route.
*
* @return	array	Query vars.
*/
function RecruitmentCkParseRoute($segments)
{
	$vars = array();
	$view = null;

	if (count($segments))
		$vars['view'] = $view = $segments[0];

	$nextPos = 1;

	$count = count($segments);

	$configRoute = RecruitmentRouteConfig();

	if (isset($configRoute[$view]))
	foreach($configRoute[$view] as $config)
	{
		if ($count <= $nextPos)
			break;

		$value = $segments[$nextPos];

		$type = (isset($config['type'])?$config['type']:'var');

		switch($type)
		{
			case 'layout':
				$vars['layout'] = $value;
				break;

			case 'slug':

				if (!isset($config['aliasKey']))
					break;

				$vars['id'] = RecruitmentParseSlug($value, $view, $config['aliasKey']);

				break;

			case 'var':
				if (!isset($config['name']))
					break;

				$vars[$config['name']] = $value;
				break;

			case 'filter':

				if (!isset($config['name']))
					break;

				if (is_array($value))
					$values = $value;
				else
					$values = explode(',', $value);

				$newValues = array();
				foreach($values as $value)
				{
					$newValue = $value;

					if (isset($config['aliasKey']) && isset($config['model']))
						$newValue = RecruitmentParseSlug($value, $config['model'], $config['aliasKey']);

					$newValues[] = $newValue;
				}

				$value = implode(',', $newValues);

				$filterName = 'filter_' . $config['name'];

				/*
				if (strpos($value, ','))
					$filterName .= '[]';
				*/

				$vars[$filterName] = $value;

				break;
		}


		$nextPos++;
	}

	return $vars;
}

/**
* Decode a slug alias and return the id of the element
*
* @param	string	$slug	Slug to decode.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	ID of the found item.
*/
function RecruitmentCkParseSlug($slug, $model, $aliasKey)
{
	$parts = explode( ':', $slug );
	$id = $parts[0];

	if (is_numeric($id))
		return (int)$id;


	// When ID is only a string, search in database
	$item = RecruitmentHelper::getData($model, array(
		'id' => array(
			$aliasKey => $id
		)
	));

	if ($item)
		return $item->id;

	return null;
}

/**
* Create a slug from an item id
*
* @param	string	$id	Item ID.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	Slug of the found item.
*/
function RecruitmentCkBuildSlug($id, $model, $aliasKey)
{
	$item = RecruitmentHelper::getData($model, array(

		// Select the alias field
		'select' => $aliasKey
	), $id);

	if ($item)
		return $id . ':' . $item->$aliasKey;

	// Not found, but bypass, and keep the current id value
	return $id;
}

/**
* Router configuration.
*
*
* @return	array	Router config.
*/
function RecruitmentCkRouteConfig()
{
	return array(
		'wheredidus' => array(
			array(
				'type' => 'layout'
			)
		),
		'wheredidu' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'doctypes' => array(
			array(
				'type' => 'layout'
			)
		),
		'doctype' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'genders' => array(
			array(
				'type' => 'layout'
			)
		),
		'gender' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'overallranges' => array(
			array(
				'type' => 'layout'
			)
		),
		'overallrange' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'programmes' => array(
			array(
				'type' => 'layout'
			)
		),
		'programme' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'countries' => array(
			array(
				'type' => 'layout'
			)
		),
		'country' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'tabs' => array(
			array(
				'type' => 'layout'
			)
		),
		'tab' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'jobstatus' => array(
			array(
				'type' => 'layout'
			)
		),
		'jobstat' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'tabsjobs' => array(
			array(
				'type' => 'layout'
			)
		),
		'tabjob' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'status' => array(
			array(
				'type' => 'layout'
			)
		),
		'stat' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'jobs' => array(
			array(
				'type' => 'layout'
			)
		),
		'job' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'degrees' => array(
			array(
				'type' => 'layout'
			)
		),
		'degree' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'applications' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id'
			),
			array(
				'type' => 'filter',
				'name' => 'job_id'
			),
			array(
				'type' => 'filter',
				'name' => 'gender_id'
			),
			array(
				'type' => 'filter',
				'name' => 'birth_country_id'
			),
			array(
				'type' => 'filter',
				'name' => 'wheredidu_id'
			),
			array(
				'type' => 'filter',
				'name' => 'status_id'
			)
		),
		'application' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'workexperiences' => array(
			array(
				'type' => 'layout'
			)
		),
		'workexperience' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'docs' => array(
			array(
				'type' => 'layout'
			)
		),
		'doc' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'referees' => array(
			array(
				'type' => 'layout'
			)
		),
		'referee' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'applicationprograms' => array(
			array(
				'type' => 'layout'
			)
		),
		'applicationprogramme' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		)
	);
}


