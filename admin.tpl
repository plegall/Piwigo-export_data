{literal}
<style>
ul.export-links { padding-left: 2em; }
ul.export-links li { list-style-type:none; }
ul.export-links li a { margin-right:10px; }
.json-icon { font-family:monospace; }
</style>
{/literal}

<ul class="export-links">
  <li><a href="{$EXPORT_DATA_ADMIN}&amp;type=albums&amp;format=csv" class="icon-file-code">CSV</a> <a href="{$EXPORT_DATA_ADMIN}&amp;type=albums&amp;format=json"><span class="json-icon">&#123;i&#125;</span> JSON</a> {'Export albums'|translate}</li>
  <li><a href="{$EXPORT_DATA_ADMIN}&amp;type=photos&amp;format=csv" class="icon-file-code">CSV</a> <a href="{$EXPORT_DATA_ADMIN}&amp;type=photos&amp;format=json"><span class="json-icon">&#123;i&#125;</span> JSON</a> {'Export photos'|translate}</li>
  <li><a href="{$EXPORT_DATA_ADMIN}&amp;type=comments&amp;format=csv" class="icon-file-code">CSV</a> <a href="{$EXPORT_DATA_ADMIN}&amp;type=comments&amp;format=json"><span class="json-icon">&#123;i&#125;</span> JSON</a> {'Export comments'|translate}</li>
  <li><a href="{$EXPORT_DATA_ADMIN}&amp;type=downloads&amp;format=csv" class="icon-file-code">CSV</a> <a href="{$EXPORT_DATA_ADMIN}&amp;type=downloads&amp;format=json"><span class="json-icon">&#123;i&#125;</span> JSON</a> {'Export downloads'|translate}</li>
  <li><a href="{$EXPORT_DATA_ADMIN}&amp;type=users&amp;format=csv" class="icon-file-code">CSV</a> <a href="{$EXPORT_DATA_ADMIN}&amp;type=users&amp;format=json"><span class="json-icon">&#123;i&#125;</span> JSON</a> {'Export users'|@translate}</li>
</ul>