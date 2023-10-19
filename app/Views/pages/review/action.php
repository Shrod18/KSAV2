<?= $this->extend("_pattern") ?>

<?= $this->section("assets") ?>
    <link rel="stylesheet" href="<?= base_url("resources/css/review/action.css") ?>">
    <script src="<?= base_url("resources/js/review/action.js") ?>"></script>
<?= $this->endSection() ?>

<?= $this->section("main") ?>

<?= $this->include("templates/navigation") ?>

<div class="slds-box" style="width: 95% !important; background-color: white; margin: auto; margin-top: 20px;">
    <div style="display: flex; flex-direction: row; justify-content: space-between;">
        <h2 class="slds-text-heading_medium">
            <?= ($action == "add" ? "Ajouter un avis" : ("Modifier un avis : " . $id)) ?>
        </h2>
    </div>
    <hr style="margin: 30px 0;">
    <form action="<?= ($action == "add" ? url_to("reviewAdd") : "") ?>" method="post">
        <div class="slds-grid slds-grid_vertical">
            <div class="slds-col">
                <div class="slds-grid slds-gutters">
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="reservation-review">N°Reservation<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <input type="text" name="reservation-review" id="reservation-review" class="slds-input"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="travel-review">Voyage<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" id="travel-review" onchange="setReviewsInputs(this.value); setDateTravels(this.value);" required>
                                        <option value="">-- Sélectionner un voyage --</option>
                                        <?php
                                        foreach ($travels as $travel) {
                                            echo "<option value='" . $travel["IDMODELEVOYAGE"] . "'>" . $travel["NOM"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="date_travel-review">Date Voyage<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" name="id_travel-review" id="id_travel-review" required disabled>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="date_travel-review">Client<abbr class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <input list="list_client-review" name="client-review" id="client-review"
                                    class="slds-input" value="<?= ($action == "add" ? "" : $data["NOM"]) ?>" required>
                            </div>
                            <datalist id="list_client-review" name="client-review" required>
                                <?php
                                foreach ($customers as $customer) {
                                    echo "<option value='" . $customer["ID_CLIENT"] . "'>" . $customer["NOM"] . " " . $customer["PRENOM"] . "</option>";
                                }
                                ?>
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="slds-col">
                <div class="slds-grid slds-gutters">
                    <div class="slds-col" id="inputs-review">
                    </div>
                    <div class="slds-col" style="border-left: 1px solid #e5e5e5;">
                        <div class="slds-grid slds-grid_vertical">
                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="positifs-review">Points positifs<abbr class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <textarea name="positifs-review" id="positifs-review" class="slds-textarea" style="height: 100px !important; resize: none;" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="negatifs-review">Points negatifs<abbr class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <textarea name="negatifs-review" id="negatifs-review" class="slds-textarea" style="height: 100px !important; resize: none;" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="slds-col">
                <div class="slds-grid slds-grid_vertical">
                    <div class="slds-col">
                        <div class="slds-clearfix">
                            <div class="slds-float_right">
                                <a href="<?= url_to("reviewViewList") ?>" class="slds-button slds-button_outline-brand"><?= ($action == "add" ? "Annuler" : "Quitter") ?></a>
                                <?php
                                if ($action == "add") {
                                    echo "<input type='submit' class='slds-button slds-button_brand' value='Ajouter'>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<?= $this->endSection() ?>