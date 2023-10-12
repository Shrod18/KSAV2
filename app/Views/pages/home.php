<?= $this->extend("_pattern") ?>

<?= $this->section("main") ?>

    <?= $this->include("templates/navigation") ?>

    <div class="slds-box" style="width: 95% !important; background-color: white; margin: auto; margin-top: 20px;">
        <div style="display: flex; flex-direction: row; justify-content: space-between;">
            <h1 class="slds-text-heading_medium">Accueil</h1>            
        </div>
        <hr style="margin: 30px 0;">
    </div>

<?= $this->endSection() ?>