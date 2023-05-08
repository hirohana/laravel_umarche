import "./bootstrap";

import Alpine from "alpinejs";
import MicroModal from "micromodal";

window.Alpine = Alpine;

Alpine.start();

MicroModal.init({
    disableScroll: true,
});
