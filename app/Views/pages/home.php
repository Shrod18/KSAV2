<?= $this->extend("_pattern") ?>

<?= $this->section("main") ?>

<?= $this->include("templates/navigation") ?>

<div class="slds-box" style="width: 95% !important; background-color: white; margin: auto; margin-top: 20px;">
    <div style="display: flex; flex-direction: row; justify-content: space-between;">
        <h1 class="slds-text-heading_medium">Accueil</h1>
    </div>
    <hr style="margin: 30px 0;">

    <div class="slds-carousel__content">
        <h2 class="slds-carousel__content-title">Bienvenue</h2>
        <p>test test test</p>
    </div>
    <div class="slds-carousel">
        <div class="slds-carousel__stage">
            <div class="slds-carousel__panels" style="transform:translateX(--200%)">
                <div id="content-id-61" class="slds-carousel__panel" role="tabpanel" aria-labelledby="indicator-id-64">
                    <div class="slds-carousel__image">
                        <img src="<?= base_url("resources/assets/images/voyage.jpg") ?>" alt="Voyages" />
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>