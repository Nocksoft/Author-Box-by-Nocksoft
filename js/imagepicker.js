var img = document.getElementById("nstab_avatar");
var inputUrl = document.getElementById("nstab_setting_avatarurl");
var inputId = document.getElementById("nstab_setting_avatarid");

var imagepicker = wp.media({
	library : {
		type : "image"
	},
	multiple: false
});


document.getElementById("nstab_setavatar").addEventListener("click", function() {
	if (imagepicker) {
		imagepicker.open();
	}
});

imagepicker.on("select", function() {
	var image = imagepicker.state().get("selection").first().toJSON();
	img.setAttribute("src", image.url);
	inputUrl.setAttribute("value", image.url);
	inputId.setAttribute("value", image.id);
});

imagepicker.on("open", function() {
	var id = inputId.getAttribute("value");
	if (id) {
		var selection = imagepicker.state().get("selection");
		attachment = wp.media.attachment(id);
		attachment.fetch();
		selection.add(attachment ? [attachment] : []);
	}
});

document.getElementById("nstab_deleteavatar").addEventListener("click", function() {
	var url = inputUrl.getAttribute("default");
	img.setAttribute("src", url);
	inputUrl.setAttribute("value", url);
});