import { ref } from 'vue';

const idUsuario = ref('');

export function guardarIdUsuario() {
  const setIdUsuario = (value) => {
    idUsuario.value = value;
  };

  return {
    idUsuario,
    setIdUsuario,
  };
}