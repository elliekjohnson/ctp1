ack.module("ack.widget", function(h) {
	h.init = function() {
		var c = new ack.tools.notes.NotePad("", document.getElementById("ack-widget"));
		c.containerClassList().add("notes");
		c.addEventListener("click", function() {
			setTimeout(function() {}, 520)
		});
		c.addEventListener("blur", function() {
			setTimeout(function() {
				clearInterval(null);
				clearInterval(null)
			}, 200);
			var a = c.containerClassList();
			a.remove("keyboard");
			a.remove("ipad-keyboard-portrait");
			a.remove("ipad-keyboard-landscape")
		});
		c.addEventListener("x-onload", function() {
			!c.value() && __settings__.preset && c.value(__settings__.preset)
		});
		ack.tools.background({
			paddingCallback: function(a, c, b) {
				c = document.querySelector("#ack-widget .notes");
				a = a.replace("padding-", "");
				c.style[a] = b
			}
		});
		if (__settings__.can_export_email || __settings__.can_export_twitter || __settings__.can_export_facebook || __settings__.can_export_evernote) {
			var b = document.createElement("img");
			b.alt = ack.lang("Share");
			b.title = ack.lang("Share");
			b.src = ack.ui.rc.share.easy.icon();
			ack.ui.toolbar.addToolbarItem(b);
			ack.ui.common.bindTap(b, function() {
				var a = {};
				__settings__.can_export_email && (a[ack.ui.rc.share.Formats.EMAIL] = {
					prefilledTo: (ack.comms.auth.details() || {}).email,
					prefilledSubject: __settings__.default_email_subject || ack.lang("Here are some notes I've made"),
					prefilledMessage: __settings__.default_email_message,
					assets: ["notes.png"]
				});
				__settings__.can_export_twitter && (a[ack.ui.rc.share.Formats.TWITTER] = {
					prefilledMessage: __settings__.default_twitter_message || ack.lang("Here are some notes I've made"),
					assets: ["notes.png"]
				});
				__settings__.can_export_facebook && (a[ack.ui.rc.share.Formats.FACEBOOK] = {
					prefilledMessage: __settings__.default_facebook_message || ack.lang("Here are some notes I've made"),
					assets: ["notes.png"]
				});
				__settings__.can_export_evernote && (a[ack.ui.rc.share.Formats.EVERNOTE] = {
					assets: ["notes.png"]
				});
				ack.ui.rc.share.selection(ack.lang("Share your notes"), ack.lang("How do you want to share your notes?"), a, function(a, b) {
					var f = "",
						d = "",
						e = "";
					switch (a) {
						case ack.ui.rc.share.Formats.EMAIL:
							f = "notes_export";
							d = ack.lang("All done!");
							e = ack.lang("The email has been sent");
							break;
						case ack.ui.rc.share.Formats.TWITTER:
							f = "notes_export_twitter";
							d = ack.lang("All done!");
							e = ack.lang("The tweet has been sent");
							break;
						case ack.ui.rc.share.Formats.FACEBOOK:
							f = "notes_export_facebook";
							d = ack.lang("All done!");
							e = ack.lang("Your status has been updated");
							break;
						case ack.ui.rc.share.Formats.EVERNOTE:
							f = "notes_export_evernote", d = ack.lang("All done!"), e = ack.lang("This has been saved to your notebook")
					}
					var g = ack.ui.loading.show();
					b.notes = c.value();
					ack.comms.request(f, b, function() {
						ack.ui.loading.hide(g);
						ack.ui.dialog.alert(d, e);
						ack.ui.rc.hide()
					}, function(a, b) {
						ack.ui.loading.hide(g);
						ack.ui.rc.common.serverCommsFail({
							response: a,
							status: b
						})
					}, {
						successAlert: {
							title: d,
							message: e
						}
					})
				})
			})
		}
		if (__settings__.can_submit_email) {
			b = document.createElement("span");
			b.textContent = ack.lang("Submit");
			var g = function() {
				var a = ack.ui.loading.show();
				ack.comms.request("submit_note", {
					notes: c.value()
				}, function() {
					ack.ui.loading.hide(a);
					ack.ui.rc.hide();
					ack.ui.dialog.alert(ack.lang("Submit your notes"), ack.lang("Your notes have been submitted"))
				}, function(b, c) {
					ack.ui.loading.hide(a);
					ack.ui.rc.common.serverCommsFail({
						response: b,
						status: c
					})
				})
			};
			ack.ui.toolbar.addToolbarItem(b);
			ack.ui.common.bindTap(b, function() {
				ack.ui.dialog.confirm(ack.lang("Submit your notes"), ack.lang("Do you wish to submit your notes to the server?"), function() {
					ack.comms.auth.isAuthenticated() ? g() : ack.ui.rc.auth.authenticateUser(ack.lang("Just one more step..."), ack.lang("We need to know your email address before sending your notes."), function() {
						g()
					}, function() {
						ack.rc.hide()
					})
				})
			})
		}
	}
});
