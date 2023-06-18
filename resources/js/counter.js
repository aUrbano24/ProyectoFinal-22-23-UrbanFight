export function createCounter() {
    /* const borderWidth = 4;
    const borderColor = rgb(255, 255, 255); */
    const counter = add([
        rect(100, 100) ,
        /* circle(55), */
        pos(center().x, center().y - 300),
        color(10, 10, 10),
        anchor("center"),
        /* outline(borderWidth, borderColor) */
      ]);
        return counter.add([
            text("60"),
            anchor("center"),
            {
                timeLeft: 60,
            }
        ]);
}



