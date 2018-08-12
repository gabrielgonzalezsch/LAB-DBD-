DROP TRIGGER IF EXISTS tg_habitacion_disponible on habitaciones;
DROP FUNCTION IF EXISTS sp_cambiar_habitaciones_disponibles;
DROP TRIGGER IF EXISTS tg_nueva_habitacion on habitaciones;
DROP FUNCTION IF EXISTS sp_nueva_habitacion_disp;
DROP TRIGGER IF EXISTS tg_habitacion_eliminada on habitaciones;
DROP FUNCTION IF EXISTS sp_habitacion_eliminada;

CREATE OR REPLACE FUNCTION sp_cambiar_habitaciones_disponibles()
RETURNS TRIGGER AS
$function$
BEGIN
  IF OLD.ya_reservado = FALSE AND NEW.ya_reservado = TRUE THEN
    UPDATE hoteles
    SET habitaciones_disponibles = habitaciones_disponibles - 1
    WHERE id_hotel = OLD.id_hotel;
    RAISE NOTICE 'Hoteles disponibles del hotel % disminuyen en 1', OLD.id_hotel;
  ELSIF OLD.ya_reservado = TRUE AND NEW.ya_reservado = FALSE THEN
      UPDATE hoteles
      SET habitaciones_disponibles = habitaciones_disponibles + 1
      WHERE id_hotel = OLD.id_hotel;
      RAISE NOTICE 'Habitaciones disponibles del hotel % aumentan en 1', OLD.id_hotel;
  END IF;
  RETURN NEW;
END;
$function$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_nueva_habitacion_disp()
RETURNS TRIGGER AS
$function2$
BEGIN
  IF NEW.ya_reservado = FALSE THEN
    UPDATE hoteles
    SET habitaciones_disponibles = habitaciones_disponibles + 1
    WHERE id_hotel = NEW.id_hotel;
    RAISE NOTICE 'Nueva habitacion para el hotel %, cantidad de habitaciones disponibles aumentando en 1', NEW.id_hotel;
  END IF;
  RETURN NEW;
END;
$function2$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION sp_habitacion_eliminada()
RETURNS TRIGGER AS
$function3$
BEGIN
  UPDATE hoteles
  SET habitaciones_disponibles = habitaciones_disponibles - 1
  WHERE id_hotel = OLD.id_hotel;
  RAISE NOTICE 'Habitacion eliminada en el hotel %, cantidad de habitaciones disponibles disminuyen en 1', OLD.id_hotel;
  RETURN OLD;
END;
$function3$
LANGUAGE plpgsql;

CREATE TRIGGER tg_habitacion_disponible
BEFORE UPDATE ON public.habitaciones
FOR EACH ROW EXECUTE PROCEDURE sp_cambiar_habitaciones_disponibles();

CREATE TRIGGER tg_habitacion_eliminada
BEFORE DELETE ON public.habitaciones
FOR EACH ROW EXECUTE PROCEDURE sp_habitacion_eliminada();

CREATE TRIGGER tg_nueva_habitacion
AFTER INSERT ON public.habitaciones
FOR EACH ROW EXECUTE PROCEDURE sp_nueva_habitacion_disp();
