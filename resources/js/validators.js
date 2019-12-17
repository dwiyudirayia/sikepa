import { helpers } from 'vuelidate/lib/validators';

export const maxSize = maxMb => file => !helpers.req(file) || file.size <= maxMb * 1000000;

export const fileType = (...types) => file => !helpers.req(file) || types.includes(file.type);

export const numberOnly = value => !helpers.req(value) || /^[0-9]*$/.test(value);

export const alphanumeric = value => !helpers.req(value) || /^[A-z0-9\s]*$/.test(value);

export const minWords = min => value => !helpers.req(value) || value.trim().split(/\s+/g).length >= min;

export const outletName = value => !helpers.req(value) || /^[\w\s]*$/.test(value);

export const domain = value => !helpers.req(value) || /^[a-z0-9](?:[a-z0-9]|-(?!-))*[a-z0-9 ]$/.test(value);
