export default class FormValidation {
    form = '[data-form]';
    formInput = '[data-input-required]';
    formInputError = '[data-input-error]';
    formInputPlaceholder = '[data-input-placeholder]';
    termsInput = '[data-input-required-terms]';

    emptyMsg = {
        default: {
            ru: 'Обязательное поле',
            en: 'Fill in the field'
        },
        file: {
            ru: 'Укажите файл',
            en: 'Specify a file'
        },
        email : {
            ru: 'Укажите email',
            en: 'Wrong email'
        },
        phone : {
            ru: 'Укажите телефон',
            en: 'Wrong phone'
        },
        name: {
            ru: 'Укажите Имя',
            en: 'Wrong name'
        },
        surname: {
            ru: 'Укажите Фамилию',
            en: 'Wrong surname'
        },
        inn: {
            ru: 'Укажите ИНН',
            en: 'Wrong surname'
        },
    };

    invalidMsg = {
        default: {
            ru: 'Неверный формат',
            en: 'Wrong format'
        },
        password: {
            ru: 'Не совпадают',
            en: 'Do not match'
        },
        email : {
            ru: 'Проверьте email, кажется, в нём ошибка',
            en: 'Wrong email'
        },
        phone : {
            ru: 'Проверьте номер, кажется, в нём ошибка',
            en: 'Wrong phone'
        },
        emailPhone : {
            ru: 'Оставьте свой телефон или email',
            en: 'Leave your phone or email'
        },
        inn : {
            ru: 'Проверьте свой ИНН, кажется, в нём ошибка',
            en: 'Leave your phone or INN'
        }
    };

    constructor() {
        this.events();
    }

    formTermsInput () {
        return this.termsInput.substring(1,this.termsInput.length - 1)
    }

    formInputSelector () {
        return this.formInput.substring(1,this.formInput.length - 1)
    }

    formInputPlaceholderSelector () {
        return this.formInputPlaceholder.substring(1,this.formInputPlaceholder.length - 1)
    }

    events () {
        var self = this;

        $(document).on('submit', this.form, function () {
            self.validate($(this));
            return false;
        });

        /*
        $(this.formInput).on('focus click', function () {
            $(this).attr('placeholder', $(this).attr(self.formInputPlaceholderSelector()))
        });
        */

        $(this.termsInput).on('change', function () {
            // self.termsToggle($(this));
        });

        // $(this.formInput).on('focus', function () {
        //   if(this.hasAttribute("placeholder")) {
        //     if($(this).hasClass("invalid") && $(this).attr('data-label').length) {
        //       $(this).attr('placeholder', $(this).attr('data-label'))
        //     }
        //   }
        // });

        // $(this.formInput).each(function() {
        //     if(this.hasAttribute("placeholder")) {
        //       let label = $(this).attr('placeholder');
        //       $(this).attr("data-label",label);
        //     }
        // });

    }

    validate ($form) {
        var self = this;
        var $inputs = $form.find(this.formInput);
        var valid = [];

        $inputs.each(function () {
            let type = $(this).attr(self.formInputSelector()) || 'text';
            let val = $(this).val();

            let formBlock = $(this).closest('.form-block');
            let errorMsg = $(this).attr('data-input-error') || null;

            $(this).removeClass('invalid');
            formBlock.find('.form-block__error').empty();

            if (!val.length) {
                // valid.push(self.invalid($(this), self.emptyMsg.default[App.lang]));
                switch (type) {
                    case 'name':
                        valid.push(self.invalid($(this), self.emptyMsg.name[App.lang]));

                        break;
                    case 'surname':
                        valid.push(self.invalid($(this), self.emptyMsg.surname[App.lang]));

                        break;
                    case 'email':
                        valid.push( self.invalid($(this), self.emptyMsg.email[App.lang]));

                        break;
                    case 'phone':
                        valid.push(self.invalid($(this), self.emptyMsg.phone[App.lang]));

                        break;
                    case 'UF_INN':
                        valid.push(self.invalid($(this), self.emptyMsg.inn[App.lang]));

                        break;
                }
            } else {
                switch (type) {
                    case 'text':
                        valid.push(self.validateText(val, $(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.invalidMsg.default[App.lang])
                        );

                        break;
                    case 'name':
                        valid.push(self.validateText(val, $(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.emptyMsg.name[App.lang])
                        );

                        break;
                    case 'surname':
                        valid.push(self.validateText(val, $(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.emptyMsg.name[App.lang])
                        );

                        break;
                    case 'email':
                        valid.push(self.validateEmail(val)
                            ? self.valid($(this))
                            : self.invalid($(this), self.invalidMsg.default[App.lang])
                        );

                        break;
                    case 'phone':
                        valid.push(self.validatePhone(val)
                            ? self.valid($(this))
                            : self.invalid($(this), self.invalidMsg.default[App.lang])
                        );

                        break;
                    case 'checkbox':
                        valid.push(self.validateCheckbox($(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.emptyMsg.default[App.lang])
                        );

                        break;
                    case 'password':
                        valid.push(self.validatePassword($(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.invalidMsg.password)
                        );

                        break;
                    case 'emailphone':
                        valid.push(self.validateEmailPhone(val, $(this))
                            // ? self.valid($(this))
                            // : self.invalid($(this), self.invalidMsg.emailPhone[App.lang])
                        );

                        break;
                    case 'UF_INN':
                        valid.push(self.validateInn(val, $(this))
                            ? self.valid($(this))
                            : self.invalid($(this), self.invalidMsg.default[App.lang])
                        );

                        break;
                }
            }
        });

        var validCount = 0;

        valid.forEach(function (item) {
            item ? validCount++ : null
        });

        if (valid.length === validCount) $form.trigger('form::valid');

        return valid.length === validCount;
    }

    validateText (val, $this) {
        if ($.trim($this.val()) === ''){
            this.invalid($this);
            return false;
        } else {
            this.valid($this);
            return true;
        }
    }

    validateEmail (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    validatePhone (phone) {
        var cleanPhone = phone.replace(/\s/g, "");
        // var re = /(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})/g;
        var re = /(([(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})/g;
        return re.test(cleanPhone);
    }

    validateEmailPhone (val, $this) {
        var self = this;
        if(val !== '') {
            if (/\+7\d{0,99}$/.test(val)) {
                if((val.length >= 12) && (val.length < 16)) {
                    self.valid($this);
                    return true;
                } else {
                    self.invalid($this, self.invalidMsg.phone[App.lang]);
                    return false;
                }
            } else if (/[^[0-9]/.test(val)) {
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(re.test(val)){
                    self.valid($this);
                    return re.test(val);
                } else {
                    self.invalid($this, self.invalidMsg.email[App.lang]);
                    return re.test(val);
                }
            } else {
                if ((val.length >= 11) && (val.length < 15)) {
                    self.valid($this);
                    return true;
                } else {
                    self.invalid($this, self.invalidMsg.phone[App.lang]);
                    return false;
                }
            }
        }
    }

    validateCheckbox ($elem) {
        return $elem.prop('checked')
    }

    validatePassword ($elem) {
        var $elems = $elem.closest('form').find('[data-input-required="password"]');
        var passValues = [];

        $elems.each(function () {
            passValues.push($(this).val());
        });

        return passValues[0] === passValues[1];
    }

    validateInn (val, $this) {
        if (val.length == 10) {
            this.valid($this);
            return true;
        } else {
            this.invalid($this, this.invalidMsg.default[App.lang]);
            return false;
        }
    }


    invalid (elem, errorMessage) {
        // console.log(errorMessage);
        let message = errorMessage || this.emptyMsg.default[App.lang];
        elem.removeClass('valid').addClass('invalid');
        elem.siblings('.error-tooltip').remove();
        elem.closest('label').append("<span class='error-tooltip'></span>");
        elem.siblings('.error-tooltip').text(errorMessage);
        // if(!elem.is("[type='checkbox']")) elem.attr('placeholder', message);
        return false;
    }

    valid(elem) {
        elem.removeClass('invalid').addClass('valid');
        elem.siblings('.error-tooltip').remove();
        return true;
    }
};