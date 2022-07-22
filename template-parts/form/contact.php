<form class="form form--contact">
    <fieldset class="form__fields">
        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--name input--required">
                    <label for="cf-name" class="input__label"><?=__( 'Ім\'я', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="text" name="name" placeholder="<?=__( 'Андрій', 'gti' ); ?>" class="input__input" id="cf-name">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--phone input--required">
                    <label for="cf-phone" class="input__label"><?=__( 'Телефон', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <input type="tel" name="phone" placeholder="+38 (0" class="input__input" id="cf-phone">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row form-row--one">
            <div class="form-col">
                <div class="input input--message">
                    <label for="cf-message" class="input__label"><?=__( 'Повідомлення', 'gti' ); ?></label>

                    <div class="input__wrap">
                        <textarea name="message" rows="3" placeholder="<?=__( 'Повідомлення', 'gti' ); ?>" class="input__input" id="cf-message"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="button button--primary form__submit"><?=__( 'Зворотній зв\'язок', 'gti' ); ?></button>
    </div>

    <input type="hidden" name="action" value="contact">
</form>