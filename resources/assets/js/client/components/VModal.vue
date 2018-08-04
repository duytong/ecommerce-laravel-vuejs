<template>
  <transition name="modal">
    <div id="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">

            <div class="modal-header">
              <slot name="header">
                default header
              </slot>
            </div>

            <div class="modal-body">
              <slot name="body">
                default body
              </slot>
            </div>

            <div class="modal__footer">
              <slot name="footer">
                <button class="btn btn--secondary" @click="$emit('close')">Cancel</button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>
