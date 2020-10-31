// JS goes here
function setAnimation(elm, animationConfig = {
    type: 'fade-out',
    time: 1000
}) {
    const typeMapping = {
        'fade-out': 'ease-in-out',
        'default': 'ease-in-out'
    };

    const time = (animationConfig.time / 1000).toFixed(1);
    let type = typeMapping[animationConfig.type];    

    if(!type) {
        type = typeMapping.default;
    }

    const transitionValue = `all ${time}s ${type}`;

    elm.style['-webkit-transition'] = transitionValue;
    elm.style['-moz-transition'] = transitionValue;
    elm.style['-ms-transition'] = transitionValue;
    elm.style['-o-transition'] = transitionValue;
    elm.style.transition = transitionValue;
}

function initAlert(config) {
    if(typeof config !== 'object') {
        throw new Error('Please provide config.')
    }

    const alertCloseBtns = document.querySelectorAll(config.closeBtnSelector);

    if(alertCloseBtns && alertCloseBtns.length) {
        alertCloseBtns.forEach((item) => {
            item.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    }

    const successAlerts = document.querySelectorAll(config.autoCloseSelector);

    if(successAlerts && successAlerts.length) {
        successAlerts.forEach(item => {
            const animationTime = 1000;

            setAnimation(item, {
                type: config.animationType,
                time: animationTime
            });

            setTimeout(() => {
                item.style.opacity = 0;

                setTimeout(() => {
                    item.remove();
                }, animationTime)
            }, config.animationTime);
        });
    }
}

window.onload = function() {
    initAlert({
        closeBtnSelector: '.alert__close-btn',
        autoCloseSelector: '.alert--success',
        autoClose: true,
        animationTime: 2000,
        animationType: 'fade out'
    });
};
