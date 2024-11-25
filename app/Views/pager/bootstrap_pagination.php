<?php if ($pager->hasPrevious()) : ?>
    <a href="<?= $pager->getFirst() ?>" class="btn btn-primary btn-sm mx-1"><<</a>
    <a href="<?= $pager->getPrevious() ?>" class="btn btn-primary btn-sm mx-1"><</a>
<?php endif ?>

<?php foreach ($pager->links() as $link) : ?>
    <a href="<?= $link['uri'] ?>" class="btn btn-sm mx-1 <?= $link['active'] ? 'btn-success' : 'btn-outline-secondary' ?>">
        <?= $link['title'] ?>
    </a>
<?php endforeach ?>

<?php if ($pager->hasNext()) : ?>
    <a href="<?= $pager->getNext() ?>" class="btn btn-primary btn-sm mx-1">></a>
    <a href="<?= $pager->getLast() ?>" class="btn btn-primary btn-sm mx-1">>></a>
<?php endif ?>
