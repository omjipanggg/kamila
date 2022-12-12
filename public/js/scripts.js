function clock() {
    const month = [ "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October",
                    "November", "December" ];

    function harold(standIn) {
        if (standIn < 10) {
            standIn = '0' + standIn;
        } return standIn;
    }
    
    let time = new Date(),
        theDate = harold(time.getDate()) + ' ' + (month[time.getMonth()]) + ' ' + time.getFullYear(),
        hours = time.getHours(),   
        minutes = time.getMinutes(),
        seconds = time.getSeconds();

    document.querySelector('#clock').innerHTML = theDate + ' ' + harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
}

const setClock = document.querySelector('#clock');

if (setClock) {
    setInterval(clock, 1000);
}

$(window).scroll(function() {
    let currentScroll = $(this).scrollTop();
    let winHeight = $(this).height();
    let docHeight = $(document).height();
    let scrollPercentage = 100 * (currentScroll / (docHeight - winHeight));
    $('#progress').css({
        'width': (scrollPercentage) + '%',
    });
    if (currentScroll < 56)
    $('#sidenavAccordion').css({
        paddingTop: 'calc(56px - ' + (currentScroll) + 'px',
    })
});

$('#alert_timer').fadeTo(2750, 500).slideUp(500, function() {
    $('#alert_timer').slideUp(500);
});

$(document).on('click', '.iconToggle', function(event) {
    let thisVal = event.currentTarget;

    let open = 'bi-eye';
    let close = 'bi-eye-slash';

    thisVal.classList.toggle(open);
    thisVal.classList.toggle(close);

    console.log(event)

    let password = [...document.querySelectorAll('.password')];
    password.map((item) => {
        item.type = event.currentTarget.parentNode.nextElementSibling.checked ? 'password' : 'text';
    });
});

window.addEventListener('DOMContentLoaded', (event) => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', (event) => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
        if (document.querySelector('#datatablesSimple')) {
            $('#datatablesSimple').DataTable({
            });
        }
        if (document.querySelector('#fetchTable')) {
            $('#fetchTable').DataTable({
                responsive: true,
                scrollX: true,
                language: {
                    paginate: {
                        previous: '<i class="fas fa-caret-left"></i>',
                        next: '<i class="fas fa-caret-right"></i>',
                    }
                },
            });
        }
    }
});

function showToast(event) {
    let target = document.querySelector('.toast');
    let container = document.querySelector('#toast-container');
    let clonedTarget = target.cloneNode(true);
    clonedTarget.children[1].innerHTML = event + ' has added.';
    container.appendChild(clonedTarget);
    const bsToast = bootstrap.Toast.getOrCreateInstance(clonedTarget);
    bsToast.show();
    setTimeout(() => {
        while (container.childNodes.length > 1) {
            container.removeChild(container.firstChild);
        }
    }, 3600);
}