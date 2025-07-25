<!-- <nav aria-label="...">
  <ul class="pagination pagination-sm justify-content-end">
    <li class="page-item disabled">
      <a class="page-link">&laquo;</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</nav> -->

<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
  <ul class="pagination pagination-sm justify-content-end">
    <?php if ($pager->hasPrevious()) : ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
          <span aria-hidden="true"><?= lang('Pager.first') ?></span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
          <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
        </a>
      </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
          <span aria-hidden="true"><?= lang('Pager.next') ?></span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
          <span aria-hidden="true"><?= lang('Pager.last') ?></span>
        </a>
      </li>
    <?php endif ?>
  </ul>
</nav>