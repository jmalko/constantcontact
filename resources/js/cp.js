import ConstantContactFieldtype from './components/fieldtypes/ConstantContactFieldtype.vue';
 
Statamic.booting(() => {
    Statamic.$components.register('constant_contact-fieldtype', ConstantContactFieldtype);
});