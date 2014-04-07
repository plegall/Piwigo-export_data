<?php
if (!defined("PHPWG_ROOT_PATH"))
{
  die ("Hacking attempt!");
}

// +-----------------------------------------------------------------------+
// | Check Access and exit when user status is not ok                      |
// +-----------------------------------------------------------------------+

check_status(ACCESS_ADMINISTRATOR);

load_language('plugin.lang', EXPORT_DATA_PATH);

// +-----------------------------------------------------------------------+
// | Tabs                                                                  |
// +-----------------------------------------------------------------------+

$page['tab'] = 'home';

// tabsheet
include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
$tabsheet = new tabsheet();
$tabsheet->set_id('export_data');

$tabsheet->add('home', l10n('Export Data'), EXPORT_DATA_ADMIN);
$tabsheet->select($page['tab']);
$tabsheet->assign();

// +-----------------------------------------------------------------------+
// | Actions                                                               |
// +-----------------------------------------------------------------------+

if (isset($_GET['type']))
{
  // output headers so that the file is downloaded rather than displayed
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=piwigo-albums.csv');
  
  // create a file pointer connected to the output stream
  $output = fopen('php://output', 'w');
  fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
  if ('albums' == $_GET['type'])
  {
    $query = '
SELECT
    id,
    name,
    permalink
  FROM '.CATEGORIES_TABLE.'
  ORDER BY id ASC
;';
    $result = pwg_query($query);

    set_make_full_url();
    while ($row = pwg_db_fetch_assoc($result))
    {
      fputcsv($output, array('url' => make_index_url(array('category' => $row))));
    }
  }

  if ('photos' == $_GET['type'])
  {
    $query = '
SELECT
    i.id,
    file,
    date_available,
    date_creation,
    i.name AS title,
    author,
    hit,
    filesize,
    width,
    height,
    latitude,
    longitude,
    group_concat(t.name) AS tags,
    comment AS description
  FROM '.IMAGES_TABLE.' AS i
    LEFT JOIN '.IMAGE_TAG_TABLE.' ON image_id=i.id
    LEFT JOIN '.TAGS_TABLE.' AS t ON tag_id=t.id
  GROUP BY i.id
  ORDER BY i.id
;';
    $result = pwg_query($query);

    $is_first = true;
    while ($row = pwg_db_fetch_assoc($result))
    {
      if ($is_first)
      {
        fputcsv($output, array_keys($row));
        $is_first = false;
      }
      
      fputcsv($output, $row);
    }
  }
  
  exit();
}

// +-----------------------------------------------------------------------+
// | form                                                                  |
// +-----------------------------------------------------------------------+

// define template file
$template->set_filename('export_data_content', realpath(EXPORT_DATA_PATH . 'admin.tpl'));

// template vars
$template->assign('EXPORT_DATA_ADMIN', EXPORT_DATA_ADMIN);

// +-----------------------------------------------------------------------+
// | sending html code                                                     |
// +-----------------------------------------------------------------------+

// send page content
$template->assign_var_from_handle('ADMIN_CONTENT', 'export_data_content');

?>