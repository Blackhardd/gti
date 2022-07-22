<form class="form form--call-back">
    <fieldset class="form__fields">
        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--name input--required">
                    <label for="cbf-name" class="input__label"><?=__( 'Ім\'я', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="name" placeholder="<?=__( 'Андрій', 'gti' ); ?>" class="input__input" id="cbf-name">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--phone input--required">
                    <label for="cbf-phone" class="input__label"><?=__( 'Телефон', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="tel" name="phone" placeholder="+38 (0" class="input__input" id="cbf-phone">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--message">
                    <label for="cbf-message" class="input__label"><?=__( 'Повідомлення', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <textarea name="message" rows="3" placeholder="<?=__( 'Повідомлення', 'gti' ); ?>" class="input__input" id="cbf-message"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="button button--primary form__submit"><?=__( 'Написати нам', 'gti' ); ?></button>
    </div>

    <input type="hidden" name="action" value="services_order">
</form>