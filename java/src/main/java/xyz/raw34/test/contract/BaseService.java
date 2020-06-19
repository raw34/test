package xyz.raw34.test.contract;

import xyz.raw34.test.entity.BaseEntity;

public interface BaseService<T extends BaseEntity> {
    T get(Long id);

    T mod(T entity);

    T add(T entity);

    boolean del(T entity);
}
