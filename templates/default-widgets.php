<?php
/**
 * Default part of docs widgets.
 *
 * @package WPSV Dokumentation
 */
?>
<div class="new-doc-container">
  <a href="<?php echo esc_url( home_url( '/dokumentredigerare/' ) ); ?>" title="Skapa ny artikel i dokumentationen" class="btn btn-primary btn-lg new-doc-btn"><i class="fa fa-plus-square"></i> Ny artikel</a>
</div>
<div id="docs-search" class="row">
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="col-md-12">
  <div>
    <i class="fa fa-search"></i>
    <label for="docs_search">Hitta dokumentation</label>
    <div class="input-group">
      <input class="form-control input-lg" type="text" id="docs_search" name="s" placeholder="Sök artiklar...">
      <input type="hidden" name="post_type" value="wpsvse_docs" />
      <span class="input-group-btn">
        <input type="submit" class="btn btn-primary input-lg" value="Sök">
      </span>
    </div>
  </div>
</form>
</div>
