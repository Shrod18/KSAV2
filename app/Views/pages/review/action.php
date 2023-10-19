<?= $this->extend("_pattern") ?>

<?= $this->section("main") ?>

<?= $this->include("templates/navigation") ?>

<div class="slds-box" style="width: 95% !important; background-color: white; margin: auto; margin-top: 20px;">
    <div style="display: flex; flex-direction: row; justify-content: space-between;">
        <h2 class="slds-text-heading_medium">
            <?= ($action == "add" ? "Ajouter un avis" : ("Modifier un avis : " . $id)) ?>
        </h2>
    </div>
    <hr style="margin: 30px 0;">
    <form action="<?= ($action == "add" ? url_to("reviewAdd") : url_to("reviewEdit", $id)) ?>" method="post">
        <div class="slds-grid slds-grid_vertical">
            <div class="slds-col">
                <div class="slds-grid slds-gutters">
                    <div class="slds-col">
                        <div class="slds-list_horizontal">
                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="reservation_review">N°Reservation<abbr
                                            class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <input type="text" name="reservation_review" id="reservation_review"
                                            class="slds-input"
                                            value="<?= ($action == "add" ? "" : $data["reservation"]) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="travel_review">Voyage<abbr
                                            class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <div class="slds-select_container">
                                            <select class="slds-select" name="travel_review" id="travel_review"
                                                required>
                                                <option value="">-- Sélectionner un voyage --</option>
                                                <?php
                                                // foreach ($voyages as $voyage) {
                                                //     echo "<option value='" . $voyage["IDVOYAGE"] . "' " . ($action == "add" ? "" : ($voyage["IDMODELEVOYAGE"] == $data["IDMODELEVOYAGE"] ? "selected" : "")) . ">" . $voyage["NOM"] . "</option>";
                                                // }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="date_review">Date Avis<abbr
                                            class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <input type="date" name="date_review" id="date_review" class="slds-input"
                                            value="<?= ($action == "add" ? "" : $data["NOM"]) ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="date_review">Client<abbr
                                            class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <input list="list_client_review" name="client_review" id="client_review"
                                            class="slds-input" value="<?= ($action == "add" ? "" : $data["NOM"]) ?>"
                                            required>
                                    </div>
                                    <datalist id="list_client_review" name="client_review" required>
                                        <option value="Chocolate"></option>
                                        <option value="Coconut"></option>
                                        <!-- <option value="">-- Sélectionner un client --</option> -->
                                        <option value="strau"></option>
                                        <?php
                                        // foreach ($voyages as $voyage) {
                                        //     echo "<option value='" . $voyage["IDVOYAGE"] . "' " . ($action == "add" ? "" : ($voyage["IDMODELEVOYAGE"] == $data["IDMODELEVOYAGE"] ? "selected" : "")) . ">" . $voyage["NOM"] . "</option>";
                                        // }
                                        ?>
                                    </datalist>
                                </div>
                            </div>


                            <div class="slds-col">
                                <div class="slds-form-element">
                                    <label class="slds-form-element__label" for="date_review">hhhhh<abbr
                                            class="slds-required">*</abbr></label>
                                    <div class="slds-form-element__control">
                                        <input type="date" name="date_review" id="date_review" class="slds-input"
                                            value="<?= ($action == "add" ? "" : $data["NOM"]) ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="slds-col">
                        <div class="slds-clearfix">
                            <div class="slds-float_right">
                                <a href="<?= url_to("reviewViewList") ?>"
                                    class="slds-button slds-button_outline-brand">Annuler</a>
                                <input type="submit" class="slds-button slds-button_brand"
                                    value="<?= ($action == "add" ? "Ajouter" : "Modifier") ?>">
                            </div>
                        </div>
                    </div>
                </div>
    </form>
</div>

<?= $this->endSection() ?>