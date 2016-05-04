<?php require_once 'assets.php'; ?>
<div class="content" style="padding-top:40px;">
  <div class="col-xs-12">
  <form method="post" action="">
    <div class="form-group">
      <label for="exampleInputEmail1">Nome do Banner</label>
      <input required type="text" class="form-control" name="name" placeholder="Nome do Banner" value="<?= is_null($banner) ? '' : $banner->name ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Slug</label>
      <input required type="text" name='slug' class="form-control" id="exampleInputEmail1" placeholder="Slug" value="<?= is_null($banner) ? '' : $banner->slug ?>">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Html</label>
      <textarea style='height:300px' required name="html"  class="form-control"><?= is_null($banner) ? '' : $banner->html ?></textarea>
    </div>
    <?php if (!is_null($banner)):?>
      <input type="hidden" name="id" value="<?= $banner->id?>">
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
  </div>
</div>
