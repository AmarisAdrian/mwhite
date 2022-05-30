const END = 'change';
const START = 'ontouchstart' in document ? 'touchstart' : 'mousedown';
const INPUT = 'input';
const MAX_ROTATION = 35;
const SOFTEN_FACTOR = 3;

export default class RangeInput {

	constructor(el) {
		this.el = el;

		this._handleEnd = this._handleEnd.bind(this);
		this._handleStart = this._handleStart.bind(this);
		this._handleInput = this._handleInput.bind(this);

		this.sliderThumbEl = el.querySelector('.rangeslider-thumb');
		this.outputEl = el.querySelector('.range-output');
		this.inputEl = el.querySelector('input[type=range]');
		this._lastOffsetLeft = 0;
		this._lastTimeStamp = 0;

		this.el.querySelector('[name=range]').addEventListener(START, this._handleStart);
	}

	_handleStart(e) {
		this._lastTimeStamp = new Date().getTime();
		this._lastOffsetLeft = this.sliderThumbEl.offsetLeft;

		//Wrap in raf because offsetLeft is updated by the plugin after this fires
		requestAnimationFrame(_ => {
			//Bind through jquery because plugin doesn't fire native event
			$(this.inputEl).on(INPUT, this._handleInput);
			$(this.inputEl).on(END, this._handleEnd);
		});
	}

	_handleEnd(e) {
		//Unbind through jquery because plugin doesn't fire native event
		$(this.inputEl).off(INPUT, this._handleInput);
		$(this.inputEl).off(END, this._handleEnd);

		requestAnimationFrame(_ => this.outputEl.style.transform = 'rotate(0deg)')
	}

	_handleInput(e) {
		let now = new Date().getTime();
		let timeElapsed = now - this._lastTimeStamp || 1;
		let distance = this.sliderThumbEl.offsetLeft - this._lastOffsetLeft;
		let direction = distance < 0 ? -1 : 1;
		let velocity = Math.abs(distance) / timeElapsed; //pixels / millisecond
		let targetRotation = Math.min(Math.abs(distance * velocity) * SOFTEN_FACTOR, MAX_ROTATION);

		requestAnimationFrame(_ => this.outputEl.style.transform = 'rotate(' + targetRotation * -direction + 'deg)');

		this._lastTimeStamp = now;
		this._lastOffsetLeft = this.sliderThumbEl.offsetLeft;
	}

}