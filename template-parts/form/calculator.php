<form class="form form--calculator">
    <fieldset class="form__fields">
        <div class="form-row form-row--two">
            <div class="form-col">
                <div class="input input--text input--name input--required">
                    <label for="calcf-name" class="input__label"><?=__( 'Ім\'я', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="name" placeholder="<?=__( 'Андрій', 'gti' ); ?>" class="input__input" id="calcf-name">
                    </div>
                </div>
            </div>

            <div class="form-col">
                <div class="input input--tel input--phone input--required">
                    <label for="calcf-phone" class="input__label"><?=__( 'Телефон', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="tel" name="phone" placeholder="+38 (0" class="input__input" id="calcf-phone">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--two">
            <div class="form-col">
                <div class="input input--select input--service input--required">
                    <label for="calcf-service" class="input__label"><?=__( 'Необхідний вид послуг', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="service" placeholder="<?=__( 'Оберіть зі списку', 'gti' ); ?>" class="input__input" id="calcf-service" readonly data-options='["First","Second","Third"]'>

                        <div class="input__icon">
                            <?=gti_get_icon( 'chevron-down' ); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-col">
                <div class="form-row form-row--two">
                    <div class="form-col">
                        <div class="input input--number input--weight input--required">
                            <label for="calcf-weight" class="input__label"><?=__( 'Вага (кг)', 'gti' ); ?></label>

                            <div class="input__wrap">
                                <input type="number" name="weight" placeholder="<?=__( '1000 кг', 'gti' ); ?>" class="input__input" id="calcf-weight">
                            </div>
                        </div>
                    </div>

                    <div class="form-col">
                        <div class="input input--number input--volume input--required">
                            <label for="calcf-volume" class="input__label"><?=__( 'Об\'єм (м3)', 'gti' ); ?></label>

                            <div class="input__wrap">
                                <input type="number" name="volume" placeholder="<?=__( '3 м3', 'gti' ); ?>" class="input__input" id="calcf-volume">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--two">
            <div class="form-col">
                <div class="input input--text input--direction input--required">
                    <label for="calcf-direction" class="input__label"><?=__( 'Маршрут доставки', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="direction" placeholder="<?=__( 'Звідки та куди', 'gti' ); ?>" class="input__input" id="calcf-direction">
                    </div>
                </div>
            </div>

            <div class="form-col">
                <div class="input input--text input--cargo input--required">
                    <label for="calcf-cargo" class="input__label"><?=__( 'Вид вантажу', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="cargo" placeholder="<?=__( 'Напишіть сюди, що потрібно перевозити', 'gti' ); ?>" class="input__input" id="calcf-cargo">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--textarea input--message">
                    <label for="calcf-message" class="input__label"><?=__( 'Додаткова інформація', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <textarea name="message" rows="3" placeholder="<?=__( 'Повідомлення', 'gti' ); ?>" class="input__input" id="calcf-message"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="button button--primary form__submit"><?=__( 'Надіслати', 'gti' ); ?></button>
    </div>

    <input type="hidden" name="action" value="calculate">
</form>