var app = {
    server: 'app/server.php',
    promoter_subjects: [],
    login: function() {
        var login = document.getElementById('login_name').value;
        var password = document.getElementById('login_password').value;
        $.ajax({ type: 'POST', url: app.server, data: {task: 2, login: login, password: password} })
            .done(function(msg) {
                if(parseInt(msg) == 1) {
                    location.reload();
                } else {
                    app.modalAlert(msg);
                }
            });
    },
    logout: function() {
        $.ajax({ type: 'POST', url: app.server, data: {task: 4} })
            .done(function(msg) {
                if(parseInt(msg) == 1) {
                    location.reload();
                } else {
                    app.modalAlert(msg);
                }
                // location.reload();
            });
    },
    userTypeChange: function() {
        var type = document.getElementById('user_type').value;
        if(type == 1) {
            document.getElementById('student_subject').style.display = 'block';
            document.getElementById('promoter_subject').style.display = 'none';
        } else {
            document.getElementById('student_subject').style.display = 'none';
            document.getElementById('promoter_subject').style.display = 'block';
        }
    },
    onSubjectChange: function(id) {
        var b = document.getElementById('subject_'+id).checked;
        if(b) {
            this.promoter_subjects.push(id);
        } else {
            var a = this.promoter_subjects;
            var cache = [];
            var i;
            var l = a.length;
            for(i = 0; i < l; i++) {
                if(a[i] != id) {
                    cache.push(a[i]);
                }
            }
            this.promoter_subjects = cache;
        }
        document.getElementById('subject_count').innerHTML = this.promoter_subjects.length;
    },
    check_key: function(e) {
        var unicode = e.keyCode? e.keyCode : e.charCode;
        if(unicode == 13) {
            if(this.getElement('loginBox')) this.login();
            else this.register();
        }
    },
    promoterChooseSubjects: function() {
        $.ajax({ type: 'POST', url: app.server, data: {task: 3, window: 3} })
            .done(function(msg) {
                document.getElementById('box').innerHTML += '<div id="modalWindow"><div id="shadow2" onClick="app.closeModal();"></div>'+msg+'</div>';
                var l = app.promoter_subjects.length;
                if(l > 0) {
                    for(var i = 0; i < l; i++) {
                        document.getElementById('subject_'+app.promoter_subjects[i]).checked = true;
                    }
                }
            });
    },
    register: function() {
        var login        = document.getElementById('register_login').value;
        var pass1        = document.getElementById('register_pass1').value;
        var pass2        = document.getElementById('register_pass2').value;
        var mail         = document.getElementById('register_mail').value;
        var name         = document.getElementById('register_name').value;
        var group		 = document.getElementById('user_type').value;

        $.ajax({ type: 'POST', url: app.server, data: {task: 1, name: name, login: login, mail:mail, pass1: pass1, pass2: pass2, group: group} })
            .done(function(msg) {
                if(parseInt(msg) == 1) {
                    location.reload();
                } else {
                    app.modalAlert(msg);
                }
            });
    },
    registerStation: function() {
        var name        = document.getElementById('station_name').value;
        var voide        = document.getElementById('station_void').value;
        var city        = document.getElementById('station_city').value;
        var street         = document.getElementById('station_street').value;

        $.ajax({ type: 'POST', url: app.server, data: {task: 5, name: name, voide: voide, city:city, street: street} })
            .done(function(msg) {
                if(parseInt(msg) == 1) {
                    location.reload();
                } else {
                    app.modalAlert(msg);
                }
            });
    },
    registerCompany: function() {
        var name        = document.getElementById('company_name').value;
        var address        = document.getElementById('address').value;
        var discount        = document.getElementById('discount').value;

        $.ajax({ type: 'POST', url: app.server, data: {task: 6, name: name, address: address, discount: discount} })
            .done(function(msg) {
                if(parseInt(msg) == 1) {
                    location.reload();
                } else {
                    app.modalAlert(msg);
                }
            });
    },
    modalAlert: function(t) {
        alert(t);
    },
    openWindow: function(i) {
        $.ajax({ type: 'POST', url: app.server, data: {task: 3, window: i} })
            .done(function(msg) {
                if(!app.getElement('modalWindow'))
                    document.getElementById('page').innerHTML += '<div id="modalWindow"><div id="shadow" onClick="app.closeModal();"></div>'+msg+'</div>';
            });
    },
    closeModal: function() {
        this.removeElement('modalWindow');
    },
    removeElement: function(i) {
        if(this.getElement(i)) {
            el = document.getElementById(i);
            el.parentNode.removeChild(el);
        }
    },
    getElement: function(i) {
        return document.getElementById(i);
    }
};

/*
	advAJAX.post({
                url: "/server",
                parameters: {
                    ev: 10,
                    id: e
                },
                onSuccess: function(n) {
                    g.small_window("options_" + e, "ulubione", n.responseText)
                }
            });
*/