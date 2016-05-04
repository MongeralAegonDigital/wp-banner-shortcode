<?php require_once 'assets.php'; ?>
<div class="content">
    <table class="table">
        <thead>
          <tr>
            <th>
              Nome do Banner
            </th>
            <th>
              Slug
            </th>
            <th>
              Ação
            </th>
          </tr>
        </thead>
      <tbody>
          <?php if ($allBanners->count()): ?>
              <?php foreach ($allBanners as $banner): ?>
                <tr>
                  <td>
                    <?= $banner->name ?>
                  </td>
                  <td>
                    <?= $banner->slug ?>
                  </td>
                  <td>
                    <a href="<?= admin_url('admin.php?page=bs_createOrUpdate&id='.$banner->id) ?>">Editar</a> |
                    <a class='delete_banner' data-id="<?= $banner->id ?>" href="">Deletar</a>
                  </td>
                </tr>
              <?php endforeach; ?>
          <?php endif; ?>
      </tbody>
    </table>
</div>
